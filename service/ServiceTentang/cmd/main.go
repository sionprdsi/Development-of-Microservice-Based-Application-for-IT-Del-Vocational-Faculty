package main

import (
	"log"
	"net/http"

	"github.com/gorilla/mux"
	_ "github.com/jinzhu/gorm/dialects/mysql"
	"github.com/sionprdsi/ServiceTentang/pkg/config"
	"github.com/sionprdsi/ServiceTentang/pkg/routes"
)

func main() {
	config.Connect()

	r := mux.NewRouter()
	routes.TentangRoutes(r)

	http.Handle("/", r)

	log.Println("Starting Server at localhost:8002")
	log.Fatal(http.ListenAndServe(":8002", r))
}
