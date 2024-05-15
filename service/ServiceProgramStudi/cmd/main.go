package main

import (
	"log"
	"net/http"

	"github.com/gorilla/mux"
	_ "github.com/jinzhu/gorm/dialects/mysql"
	"github.com/sionprdsi/ServiceProgramStudi/pkg/config"
	"github.com/sionprdsi/ServiceProgramStudi/pkg/routes"
)

func main() {
	config.Connect()

	r := mux.NewRouter()
	routes.ProgramstudiRoutes(r)

	http.Handle("/", r)

	log.Println("Starting Server at localhost:8003")
	log.Fatal(http.ListenAndServe(":8003", r))
}
