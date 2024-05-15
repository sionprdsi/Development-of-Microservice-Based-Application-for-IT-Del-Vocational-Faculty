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
	"github.com/sionprdsi/ServiceTentang/pkg/config"
	"github.com/sionprdsi/ServiceTentang/pkg/models"
)

// Fungsi GetTentang menangani permintaan GET untuk mengambil data tentang
func GetTentang(w http.ResponseWriter, r *http.Request) {
	db := config.GetDB() // Mengambil koneksi database
	var tentang models.Tentang
	db.First(&tentang) // Mengambiltentang pertama dari database

	w.Header().Set("Content-Type", "application/json")
	json.NewEncoder(w).Encode(tentang) // Mengirim data tentang dalam format JSON
}

func UpdateTentang(w http.ResponseWriter, r *http.Request) {
	db := config.GetDB() // Mengambil koneksi database
	var tentang models.Tentang

	// Mengambil ID tentang dari URL
	vars := mux.Vars(r)
	id := vars["id"]

	// Membaca isi permintaan untuk mengupdate data tentang atau beranda
	r.ParseMultipartForm(10 << 20) // Max 10 MB files

	// Proses unggahan file jika ada
	if file, handler, err := r.FormFile("sejarah_foto"); err == nil {
		defer file.Close()

		// Menyimpan file yang diunggah di direktori yang ditentukan
		sejarahFotoPath := filepath.Join("public", "SejarahFoto", handler.Filename)
		dst, err := os.Create(sejarahFotoPath)
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

		// Set field tentang.SejarahFoto dengan path file yang baru disimpan
		tentang.SejarahFoto = sejarahFotoPath
	}

	// Mencari tentang yang ada berdasarkan ID
	if db.First(&tentang, id).RecordNotFound() {
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

	// Memperbarui bidang tentang dengan data baru
	if err := json.Unmarshal(body, &tentang); err != nil {
		log.Println("Error decoding JSON:", err)
		http.Error(w, err.Error(), http.StatusBadRequest)
		return
	}

	// Menyimpan tentang ke database
	if err := db.Save(&tentang).Error; err != nil {
		log.Println("Error saving data:", err)
		http.Error(w, err.Error(), http.StatusInternalServerError)
		return
	}

	w.WriteHeader(http.StatusOK)
	w.Write([]byte("Tentang updated successfully"))
}

func ProfilRoutes(r *mux.Router) {
	r.HandleFunc("/admin/tentang", GetTentang).Methods("GET")
	r.HandleFunc("/admin/tentang/update", UpdateTentang).Methods("POST")
}
