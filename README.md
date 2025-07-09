# Interactieve Laravel CV Applicatie

Deze Laravel-applicatie is gebouwd als mijn interactieve en dynamische cv. In plaats van een statisch pdf-bestand, kun je hier real-time mijn:

- **Vaardigheden** (met beoordeling en iconen)
- **Werkervaring**
- **Opleidingen**
- **Persoonlijke gegevens**
- **Tags & kernkwaliteiten**

zien — inclusief slimme automatisering, logging en Telegram-notificaties voor recruiterinteracties.

---

## 🧰 Techniek & Stack

- **Framework:** Laravel 11
- **Frontend:** Tailwind CSS, Blade
- **DevOps-integraties:** Telegram alerts, Healthchecks, custom logging
- **CI/CD-ready:** Ondersteuning voor deploy hooks en jobs
- **Overige tools:** Docker, Nginx, Git, Redis, Cron, Promtail, Grafana

---

## ⚙️ Installatie

1. **Clone deze repo:**

```bash
git clone https://github.com/roberto-guagliardo/cv-app.git
cd cv-app
```

2. **Installeer dependencies:**

```bash
composer install
npm install && npm run build
```

3. **Maak .env aan en configureer je database, storage en Telegram:**

```bash
cp .env.example .env
php artisan key:generate
```

4. **Voer migraties & seeders uit:**

```bash
php artisan migrate --seed
```

5. **Geniet van de app:**

```bash
php artisan serve
```

---

## 🌐 Live Demo

Wil je zien hoe het eruitziet? Bekijk mijn live cv op:

➡️ [cv.robert.ooo](https://cv.robert.ooo)

---

## 📊 Bijdragen

Deze applicatie is persoonlijk en niet bedoeld voor publieke bijdragen, maar voel je vrij om de structuur of ideeën te gebruiken voor je eigen showcase-app.

---

## 💌 Contact

Wil je mij benaderen voor een samenwerking of opdracht? 
Gebruik het contactformulier op de site of stuur direct een bericht via [Telegram](https://t.me/robertguagliardo).
