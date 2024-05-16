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
	"github.com/sionprdsi/ServiceBeranda/pkg/config"
	"github.com/sionprdsi/ServiceBeranda/pkg/models"
)

// Fungsi GetProfil menangani permintaan GET untuk mengambil data profil
func GetProfil(w http.ResponseWriter, r *http.Request) {
	db := config.GetDB() // Mengambil koneksi database
	var profil models.Profil
	db.First(&profil) // Mengambil profil pertama dari database

	w.Header().Set("Content-Type", "application/json")
	json.NewEncoder(w).Encode(profil) // Mengirim data profil dalam format JSON
}

// Fungsi UpdateProfil menangani permintaan PUT untuk memperbarui data profil
func UpdateProfil(w http.ResponseWriter, r *http.Request) {
	db := config.GetDB() // Mengambil koneksi database
	var profil models.Profil

	// Mengambil ID tentang dari URL
	vars := mux.Vars(r)
	id := vars["id"]

	// Membaca isi permintaan untuk mengupdate data tentang atau beranda
	r.ParseMultipartForm(10 << 20) // Max 10 MB files

	// Proses unggahan file jika ada
	if file, handler, err := r.FormFile("logo"); err == nil {
		defer file.Close()

		// Menyimpan file yang diunggah di direktori yang ditentukan
		logoPath := filepath.Join("public", "Logo", handler.Filename)
		dst, err := os.Create(logoPath)
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
		profil.Logo = logoPath

	}

	// Mencari tentang yang ada berdasarkan ID
	if db.First(&profil, id).RecordNotFound() {
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
	if err := json.Unmarshal(body, &profil); err != nil {
		log.Println("Error decoding JSON:", err)
		http.Error(w, err.Error(), http.StatusBadRequest)
		return
	}

	// Menyimpan tentang ke database
	if err := db.Save(&profil).Error; err != nil {
		log.Println("Error saving data:", err)
		http.Error(w, err.Error(), http.StatusInternalServerError)
		return
	}

	w.WriteHeader(http.StatusOK)
	w.Write([]byte("profil updated successfully"))
}

// Fungsi CreateProfil menangani permintaan POST untuk membuat data profil baru
func CreateProfil(w http.ResponseWriter, r *http.Request) {
	db := config.GetDB() // Mengambil koneksi database
	var profil models.Profil

	// Membaca isi permintaan untuk membuat data profil baru
	r.ParseMultipartForm(10 << 20) // Max 10 MB files

	// Proses unggahan file jika ada
	if file, handler, err := r.FormFile("logo"); err == nil {
		defer file.Close()

		// Menyimpan file yang diunggah di direktori yang ditentukan
		logoPath := filepath.Join("public", "Logo", handler.Filename)
		dst, err := os.Create(logoPath)
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
		profil.Logo = logoPath
	}

	// Mencoba untuk mendekode JSON body ke dalam struktur sementara
	body, err := ioutil.ReadAll(r.Body)
	if err != nil {
		log.Println("Error reading body:", err)
		http.Error(w, err.Error(), http.StatusInternalServerError)
		return
	}

	// Memasukkan data baru ke dalam struktur profil
	if err := json.Unmarshal(body, &profil); err != nil {
		log.Println("Error decoding JSON:", err)
		http.Error(w, err.Error(), http.StatusBadRequest)
		return
	}

	// Menyimpan profil baru ke dalam database
	if err := db.Create(&profil).Error; err != nil {
		log.Println("Error saving data:", err)
		http.Error(w, err.Error(), http.StatusInternalServerError)
		return
	}

	// Mengirim respons berhasil
	w.WriteHeader(http.StatusCreated)
	w.Write([]byte("profil created successfully"))
}

// Fungsi DeleteProfil menangani permintaan DELETE untuk menghapus data profil
func DeleteProfil(w http.ResponseWriter, r *http.Request) {
	db := config.GetDB() // Mengambil koneksi database
	var profil models.Profil

	// Mengambil ID tentang dari URL
	vars := mux.Vars(r)
	id := vars["id"]

	// Mencari tentang yang ada berdasarkan ID
	if db.First(&profil, id).RecordNotFound() {
		log.Println("Profil not found")
		http.Error(w, "Profil not found", http.StatusNotFound)
		return
	}

	// Menghapus profil dari database
	if err := db.Delete(&profil).Error; err != nil {
		log.Println("Error deleting data:", err)
		http.Error(w, err.Error(), http.StatusInternalServerError)
		return
	}

	// Mengirim respons berhasil
	w.WriteHeader(http.StatusOK)
	w.Write([]byte("profil deleted successfully"))
}

// ProfilRoutes mendefinisikan rute untuk operasi profil
func ProfilRoutes(r *mux.Router) {
	r.HandleFunc("/admin/profil", GetProfil).Methods("GET")
	r.HandleFunc("/admin/profil/update", UpdateProfil).Methods("PUT")
	r.HandleFunc("/admin/profil/create", CreateProfil).Methods("POST")
	r.HandleFunc("/admin/profil/delete/{id}", DeleteProfil).Methods("DELETE")
}
