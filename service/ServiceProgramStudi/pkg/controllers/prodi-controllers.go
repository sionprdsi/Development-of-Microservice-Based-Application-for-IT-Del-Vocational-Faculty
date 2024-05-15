package controllers

import (
	"encoding/json"
	"io"
	"io/ioutil"
	"log"
	"net/http"
	"os"
	"path/filepath"

	"github.com/gorilla/mux"
	"github.com/sionprdsi/ServiceProgramStudi/pkg/config"
	"github.com/sionprdsi/ServiceProgramStudi/pkg/models"
)

// Fungsi GetProdi menangani permintaan GET untuk mengambil data prodi

func GetProgramstudi(w http.ResponseWriter, r *http.Request) {
	db := config.GetDB()
	var prodi []models.Prodi
	db.Find(&prodi)

	w.Header().Set("Content-Type", "application/json")
	json.NewEncoder(w).Encode(prodi)
}

func CreateProgramstudi(w http.ResponseWriter, r *http.Request) {
	db := config.GetDB()
	var prodi models.Prodi
	json.NewDecoder(r.Body).Decode(&prodi)

	db.Create(&prodi)
	w.Header().Set("Content-Type", "application/json")
	json.NewEncoder(w).Encode(prodi)
}

func UpdateProgramstudi(w http.ResponseWriter, r *http.Request) {
	db := config.GetDB() // Mengambil koneksi database
	var prodi models.Prodi

	// Mengambil ID prodi dari URL
	vars := mux.Vars(r)
	id := vars["id"]

	// Membaca isi permintaan untuk mengupdate data prodi atau beranda
	r.ParseMultipartForm(10 << 20) // Max 10 MB files

	// Proses unggahan file jika ada
	if file, handler, err := r.FormFile("foto"); err == nil {
		defer file.Close()

		// Menyimpan file yang diunggah di direktori yang ditentukan
		prodifotoPath := filepath.Join("public", "Foto", handler.Filename)
		dst, err := os.Create(prodifotoPath)
		if err != nil {
			log.Println("Error creating file:", err)
			http.Error(w, err.Error(), http.StatusInternalServerError)
			return
		}
		defer dst.Close()

		// Menyalin isi file yang diunggah ke file tujuan
		if _, err := io.Copy(dst, file); err != nil {
			log.Println("Error copying file:", err)
			http.Error(w, err.Error(), http.StatusInternalServerError)
			return
		}

		// Set field prodi ke foto dengan path file yang baru disimpan
		prodi.Foto = prodifotoPath
	}

	// Mencari foto yang ada berdasarkan ID
	if db.First(&prodi, id).RecordNotFound() {
		log.Println("Profil not found")
		http.Error(w, "Profil not found", http.StatusNotFound)
		return
	}

	// Mendekode JSON body ke dalam struktur sementara
	body, err := ioutil.ReadAll(r.Body)
	if err != nil {
		log.Println("Error reading body:", err)
		http.Error(w, err.Error(), http.StatusInternalServerError)
		return
	}

	// Memperbarui bidang prodi dengan data baru
	if err := json.Unmarshal(body, &prodi); err != nil {
		log.Println("Error decoding JSON:", err)
		http.Error(w, err.Error(), http.StatusBadRequest)
		return
	}

	// Menyimpan prodi ke database
	if err := db.Save(&prodi).Error; err != nil {
		log.Println("Error saving data:", err)
		http.Error(w, err.Error(), http.StatusInternalServerError)
		return
	}

	w.WriteHeader(http.StatusOK)
	w.Write([]byte("Prodi updated successfully"))
}

func DeleteProgramstudi(w http.ResponseWriter, r *http.Request) {
	db := config.GetDB()
	var prodi models.Prodi
	params := mux.Vars(r)

	db.Delete(&prodi, params["id"])
	w.WriteHeader(http.StatusNoContent)
}

func ProgramstudiRoutes(r *mux.Router) {
	// Routes for handling Program Studi
	r.HandleFunc("/admin/prodi", GetProgramstudi).Methods("GET")
	r.HandleFunc("/admin/prodi", CreateProgramstudi).Methods("POST")
	r.HandleFunc("/admin/prodi/update/{id}", UpdateProgramstudi).Methods("PUT")
	r.HandleFunc("/admin/prodi/{prodi}", DeleteProgramstudi).Methods("DELETE")
	r.HandleFunc("/admin/prodi/update", UpdateProgramstudi).Methods("POST")
}
