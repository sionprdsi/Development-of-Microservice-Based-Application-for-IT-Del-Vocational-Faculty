// config/config.go

package config

import (
	"github.com/jinzhu/gorm"
	_ "github.com/jinzhu/gorm/dialects/mysql"
)

var (
	Db *gorm.DB
)

func Connect() {
	d, err := gorm.Open("mysql", "root:@tcp(localhost:3307)/micro_beranda?charset=utf8mb4&parseTime=True&loc=Local")
	if err != nil {
		panic(err)
	}
	Db = d
}

func GetDB() *gorm.DB {
	return Db
}
