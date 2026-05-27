# 🦯 Smart Blind Cane - Full-Stack IoT Web Tracking System

Aplikasi pelacak lokasi real-time dan sistem pendeteksi rintangan terpadu untuk penyandang tunanetra. Proyek ini merupakan implementasi Tugas Akhir (S1 Teknik Komputer - Universitas Teknokrat Indonesia) yang telah diuji coba secara langsung di SLB-A Bina Insani Bandar Lampung.

Sistem ini menggabungkan perangkat keras (*embedded system*) pada tongkat dengan antarmuka web progresif (PWA) untuk pemantauan jarak jauh oleh keluarga atau pengasuh.

## 🚀 Fitur Utama

### 🛠️ Fitur Perangkat Keras (Smart Cane)
*   **Pendeteksi Rintangan:** Menggunakan sensor ultrasonik HC-SR04 untuk mendeteksi objek di depan pengguna dan memberikan peringatan suara via Buzzer. Jangkauan deteksi dapat diatur menggunakan potensiometer.
*   **Pendeteksi Jalur Pemandu (Guiding Block):** Menggunakan sensor warna TCS34725 untuk mendeteksi warna kuning pada *guiding block*. Sistem akan menonaktifkan motor vibrator saat berada di jalur yang benar.
*   **Pelacakan Lokasi:** Menggunakan Modul GPS Neo-6M untuk mendapatkan titik koordinat (Latitude/Longitude).
*   **Konektivitas Pintar:** Dilengkapi `WiFiManager` untuk kemudahan konfigurasi WiFi tanpa perlu *hardcode* kredensial, serta transmisi data asinkron (*non-blocking*).

### 💻 Fitur Perangkat Lunak (Web Dashboard)
*   **Pemantauan Real-Time:** Antarmuka peta interaktif berbasis Leaflet.js dengan pembaruan data asinkron setiap 5 detik tanpa perlu me-refresh halaman (Live Update Polling).
*   **Reverse Geocoding:** Konversi otomatis titik koordinat menjadi nama wilayah/kota administratif menggunakan Geoapify API.
*   **Analisis Data:** Menampilkan total titik perjalanan, kalkulasi perkiraan jarak tempuh (menggunakan formula Haversine), dan fitur Ekspor data GPS ke format CSV beserta ringkasan akurasinya.
*   **Progressive Web App (PWA):** Dapat diinstal di perangkat *mobile* (Android/iOS) dengan dukungan *Service Worker* dan *Manifest*.
*   **UI/UX Modern:** Mendukung mode Gelap/Terang (Dark/Light mode) dan pelacakan otomatis (Auto-Follow Marker).

---

## 🏗️ Arsitektur & Teknologi

**Firmware / Hardware:**
*   Mikrokontroler: ESP32 Devkit V1 (C/C++)
*   Library C++: `TinyGPS++.h`, `WiFiManager.h`, `ArduinoJson.h`, `Adafruit_TCS34725.h`

**Web Frontend & Backend:**
*   Frontend: HTML5, CSS3, Bootstrap 5, JavaScript (ES6)
*   Maps Engine: Leaflet.js (OpenStreetMap)
*   Backend API: PHP 8+
*   Database: MySQL
*   External API: Geoapify API

---

## 📂 Struktur Direktori

```text
├── Firmware_ESP32/
│   └── GABUNGAN.ino         # Source code utama mikrokontroler C++
│
└── Web_Dashboard_Tracking/
    ├── db_config.php        # Konfigurasi koneksi database PHP & MySQL
    ├── get_locations.php    # Endpoint API (GET) untuk mengambil histori lokasi
    ├── save_location.php    # Endpoint API (POST) untuk menerima data dari ESP32
    ├── index.html           # Antarmuka utama dashboard pemantauan
    ├── style.css            # Styling khusus dan transisi animasi mode gelap/terang
    ├── script.js            # Logika frontend, Leaflet Maps, dan Live Polling
    ├── manifest.json        # Konfigurasi PWA (Web App Manifest)
    └── sw.js                # Service Worker untuk caching aset PWA
