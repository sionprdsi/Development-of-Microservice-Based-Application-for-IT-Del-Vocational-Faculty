package routes

import (
	"github.com/gorilla/mux"
	"github.com/sionprdsi/ServiceProgramStudi/pkg/controllers"
)

func ProgramstudiRoutes(r *mux.Router) {
	r.HandleFunc("/admin/prodi", controllers.GetProgramstudi).Methods("GET")
	r.HandleFunc("/admin/prodi", controllers.CreateProgramstudi).Methods("POST")
	r.HandleFunc("/admin/prodi/update", controllers.UpdateProgramstudi).Methods("PUT")
	r.HandleFunc("/admin/prodi/update/{id}", controllers.UpdateProgramstudi).Methods("PUT")
	r.HandleFunc("/admin/prodi/{id}", controllers.DeleteProgramstudi).Methods("DELETE")
}
