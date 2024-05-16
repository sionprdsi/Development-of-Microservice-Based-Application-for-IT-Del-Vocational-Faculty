package routes

import (
	"github.com/gorilla/mux"
	"github.com/sionprdsi/ServiceBeranda/pkg/controllers"
)

func ProfilRoutes(r *mux.Router) {
	r.HandleFunc("/admin/profil", controllers.GetProfil).Methods("GET")
	r.HandleFunc("/admin/profil/update", controllers.UpdateProfil).Methods("PUT")
	r.HandleFunc("/admin/profil/update/{id}", controllers.UpdateProfil).Methods("PUT")
}
