package main

import (
	"log"
	"net/http"

	"github.com/gorilla/mux"
	_ "github.com/jinzhu/gorm/dialects/mysql"
	"github.com/sionprdsi/ServiceBeritaPrestasi/pkg/config"
	"github.com/sionprdsi/ServiceBeritaPrestasi/pkg/routes"
)

func main() {
	config.Connect()

	r := mux.NewRouter()
	routes.ProfilRoutes(r)

	http.Handle("/", r)

	log.Println("Starting Server at localhost:8001")
	log.Fatal(http.ListenAndServe(":8001", r))
}
