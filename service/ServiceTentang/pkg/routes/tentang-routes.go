package routes

import (
	"github.com/gorilla/mux"
	"github.com/sionprdsi/ServiceTentang/pkg/controllers"
)

func TentangRoutes(r *mux.Router) {
	r.HandleFunc("/admin/tentang", controllers.GetTentang).Methods("GET")
	r.HandleFunc("/admin/tentang/update", controllers.UpdateTentang).Methods("PUT")
	r.HandleFunc("/admin/tentang/create", controllers.CreateTentang).Methods("POST")
	r.HandleFunc("/admin/tentang/delete/{id}", controllers.DeleteTentang).Methods("DELETE")
}
