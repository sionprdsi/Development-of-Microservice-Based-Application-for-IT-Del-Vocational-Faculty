package models

type Prodi struct {
	// Definisikan struktur prodi sesuai dengan model pada Laravel
	Nama      string `json:"nama"`
	Judul     string `json:"judul"`
	Subjudul  string `json:"subjudul"`
	Foto      string `json:"foto"`
	Sejarah   string `json:"sejarah"`
	Visi      string `json:"visi"`
	Misi      string `json:"misi"`
	Lulusan   string `json:"lulusan"`
	Kurikulum string `json:"kurikulum"`
	TeksDosen string `json:"teks_dosen"`
}
