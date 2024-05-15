package controllers

import (
	"encoding/json"
	"io/ioutil"
	"log"
	"net/http"

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
	db := config.GetDB() // Dapatkan koneksi database
	var prodi models.Prodi

	// Dapatkan ID Prodi dari URL
	vars := mux.Vars(r)
	id := vars["id"]

	// Parse body request untuk memperbarui data Prodi
	body, err := ioutil.ReadAll(r.Body)
	if err != nil {
		log.Println("Error reading body:", err)
		http.Error(w, err.Error(), http.StatusInternalServerError)
		return
	}

	// Decode JSON body ke struct sementara
	if err := json.Unmarshal(body, &prodi); err != nil {
		log.Println("Error decoding JSON:", err)
		http.Error(w, err.Error(), http.StatusBadRequest)
		return
	}

	// Temukan catatan Prodi yang ada berdasarkan ID
	if db.First(&prodi, id).RecordNotFound() {
		log.Println("Prodi not found")
		http.Error(w, "Prodi not found", http.StatusNotFound)
		return
	}

	// Update bidang catatan Prodi yang ada dengan data baru
	if err := db.Model(&prodi).Updates(prodi).Error; err != nil {
		log.Println("Error updating data:", err)
		http.Error(w, err.Error(), http.StatusInternalServerError)
		return
	}

	// Respon dengan pesan sukses
	response := map[string]interface{}{
		"success": true,
	}
	w.Header().Set("Content-Type", "application/json")
	json.NewEncoder(w).Encode(response)
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
