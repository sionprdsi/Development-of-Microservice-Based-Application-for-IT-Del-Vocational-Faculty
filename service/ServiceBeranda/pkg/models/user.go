package models

type Profil struct {
	ID           uint   `gorm:"primaryKey"`
	Nama         string `json:"nama"`
	Alamat       string `json:"alamat"`
	KodePos      string `json:"kode_pos"`
	Telepon      string `json:"telepon"`
	Email        string `json:"email"`
	Karir        string `json:"karir"`
	Peta         string `json:"peta"`
	KenapaVokasi string `json:"kenapa_vokasi"`
	Facebook     string `json:"facebook"`
	Twitter      string `json:"twitter"`
	Youtube      string `json:"youtube"`
	Instagram    string `json:"instagram"`
	Logo         string `json:"logo"`
	Video        string `json:"video"`
}

// func (p *Profil) TableName() string {
// 	return "profils"
// }
