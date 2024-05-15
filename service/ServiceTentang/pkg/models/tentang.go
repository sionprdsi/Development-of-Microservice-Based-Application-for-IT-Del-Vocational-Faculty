// Pkg/Models/tentang.go

package models

type Tentang struct {
	ID          uint   `gorm:"primary_key" json:"id"`
	Sejarah     string `json:"sejarah"`
	SejarahFoto string `json:"sejarah_foto"`
	Visi        string `json:"visi"`
	Misi        string `json:"misi"`
	TujuanFoto  string `json:"tujuan_foto"`
	Landasan    string `json:"landasan"`
	Sasaran     string `json:"sasaran"`
	Makna       string `json:"makna"`
}
