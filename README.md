# Laboratorium medyczne
##### Projektowanie zespołowe 2015

## Wymagania wstępne
1.  Utworzone konto na github.com 
    Upewnij się, że Twoje konto zostało dołączone do grupy deweloperów pracujących nad projektem **labmed**.
    Jeśli nie, zgłoś się taką potrzebę.
    
2.  Zainstalowany git. 
    
3.  Lokalnie zainstalowany serwer Apache z obsługą PHP (przynajmniej w wersji 5.5.9) oraz MySQL (bez wymagań).
    Ja do lokalnej pracy wybrałam serwer WAMP. Proces jego instalacji przedstawiony jest poniżej.
    
4.  Środowisko deweloperskie aka IDE. 
    Dowolna dowolność, ja wybrałam najpierw Eclipse'a (dla Java EE, w wersji Neon, z zainstalowanym dodatkiem PHP Development Tools), lecz nie dawał takich możliwości jak... PhpStorm (jako cząstka IntelliJ). Dla studentów i zastosowań niekomercyjnych jest darmowy i całkiem sprawnie sobie radzi.
    
    
## Instalacja serwera WAMP
1. Ściągamy wersję 32-bitową lub 64 ze strony WAMPa http://www.wampserver.com/en/
2. Instalujemy w wybranej lokalizacji (klikając dalej, dalej, finish..)
3. Po zakończonej instalacji powinna pojawić się zielona ikonka włączonego serwera WAMP (koło zegarka).

### Krótkie słowo wstępu
* Zielony kolor ikony oznacza, że serwer działa i wpisując `http://localhost` w przeglądarkę powinna pojawić się strona WAMPa
* Żółty oznacza, że część serwisów uruchomiła się poprawnie, a część nie. Trzeba zobaczyć logi i uruchomić Google.
* Czerwona oznacza wyłączony serwer. 

* Sprawdzenie co zawiera WAMP odbywa się na kliknięcie LPM na ikonce koło zegarka:
  * można tu zatrzymać, uruchomić bądź zrestartować WAMPa
  * można sprawdzić konfigurację Apache, MySQL i PHP
  * można uruchomić PhpMyAdmina (który pozwala na swobodne i proste przeglądanie bazy) - klikając w element `phpMyAdmin`
  * można sprawdzić zawartość katalogu, gdzie znajdują się wszelkie pliki widoczne po wpisaniu w przeglądarkę `http://localhost` - za pomocą elementu `www directory`

## Instalacja IDE
1. Jeśli wybrany Eclipse:
  * Ściągamy Eclipse w wersji jakiej chcemy np. stąd http://www.eclipse.org/downloads/packages/release/Neon/M3 *(wersja Neon)* dla odpowiedniego środowiska Windows/Linux etc. 
  * Rozpakowujemy w wybranej lokalizacji.
  * Po uruchomieniu instalujemy PDT stąd https://eclipse.org/pdt/ *(Help/Install new software...)*
  
2. Jeśli PHPStorm
  * Sprawdzamy, która licencja nam odpowiada na https://www.jetbrains.com/buy/classroom/?product=phpstorm i klikamy na `Apply for free student pack`. Tam podajemy uczelniany adres e-mail i swoje dane - czyt. zakładamy konto. 
  * Po stworzeniu konta, ściągamy PHPStorm'a w wersji trial (na 30 dni) https://www.jetbrains.com/phpstorm/download/
  * Po instalacji logujemy się na utworzone na początku konto, bądź cieszymy się PHPStormem przez 30 dni.
  * Importujemy projekt za pomocą File/Open.

## Konfiguracja GIT
Klonowanie środowiska odbywa się poprzez:
`git clone git@github.com:aszlacheta/labmed.git`

W przypadku jakichkolwiek problemów z dostępem *(access denied)* prawdopodobnie przyczyną jest brak dołączonego do GitHub'a klucza. Więcej informacji i co trzeba zrobić: `https://help.github.com/articles/generating-ssh-keys/`

    
#Laravel

##Instalacja

1. Zainstaluj **composer**. Composer to *dependency manager* czyli manager zależności. Jest tym samym co Maven dla Javy. Instalacja typowa, dostępna poprzez `https://getcomposer.org/doc/00-intro.md`. Podczas instalacji zostaniesz poproszony o ścieżkę dla PHP, podaj tę z katalogu WAMPa - np. `C:\wamp\bin\php\php5.5.12\`. 
By sprawdzić czy wszystko działa w konsoli wpisz `composer -V`. Jeśli wyrzuca błąd, prawdopodobnie jest problem ze zmienną środowiską *PATH*. By sprawdzić czy ścieżka instalacyjna composer'a znalazła się w *PATHie*:
 * wciśnij kombinację klawiszy (Windows) Wind + Pause Break,
 * w nowootwartym oknie kliknij na **Zaawansowane ustawienia systemu**,
 * potem **zmienne środowiskowe**,
 * w *zmiennych systemowych* odnajdź **PATH** i kliknij **Edytuj...**
 * dodaj średnik i nową ścieżkę dla *composer'a* czyli np. `;C:\Users\Aleksandra\AppData\Roaming\Composer\vendor\bin`
 
2. Potem zainstaluj **Laravel**:
`composer global require "laravel/installer"`

3. Sprawdź czy wpisanie w konsolę polecenia `laravel -V` nie powoduje błędu. Jeśli tak, prawodpodobnie brakuje laravel'a w PATH'ie (podobny problem jak w kroku 1wszym).

4. Utworzenie przykładowego projektu odbywa się za pomocą:
`laravel new [nazwa projektu]', gdzie *[nazwa projektu]* to wymyślona przez Ciebie nazwa - oczywiście nie jest to wymagane, jako że projekt **labmed** jest już utworzony.

5. Zaimportuj projekt do swojego IDE i utwórz plik `.env` w głównym folderze projektu, kopiując zawartość pliku `.env.example`. Zmień w nim jedynie ustawienia bazy - jej nazwę, użytkownika i hasło (musisz ją wcześniej utworzyć w phpMyAdminie http://localhost/phpmyadmin


## Użyteczne linki - Laravel
* Oficjalna dokumentacja Laravel http://laravel.com/docs/5.1
* Polska dokumentacja Laravel (tylko dla 4.0, a my mamy 5.1 - pozwala zrozumieć o co cho) http://laravel-docs.pl/
* Dwa tutoriale, które pozwoliły mi zrozumieć co jak się je: 
  * http://www.sitepoint.com/bootstrapping-laravel-crud-project/
  * http://www.sitepoint.com/crud-create-read-update-delete-laravel-app/
* Mnóstwo filmów dokumentujących dewelopowanie w Laravel https://laracasts.com/skills/laravel


# Development w Laravel
## Informacje ogólne
MVC w Laravel opiera się na definiowaniu Controllerów, Widoków (w postaci plików blade.php) i Modeli. Mapowanie poszczególnych kontrolerów odbywa się za pomocą Routerów.

## Routes
Plik **routes.php** (który można znaleźć w *app/Http/routes.php*) odpowiada za routowanie na stronie, tj. przypisywanie odpowiednim aliasom URL odpowiednich kontrolerów (które dalej nawigują po stronie).
### Przykład
*Route::resource('odczynniki', 'OdczynnikiController');* odpowiada za podpięcie zachowania strony oraz WebService'ów (REST) do kontrolera *OdczynnikiController* tj. po wpisaniu w przeglądarkę http://localhost/labmed/public/odczynniki możemy wykonać akcje zadeklarowane w kontrolerze.

## Controllers
Pliki kontrolerów można znaleźć w *app/Http/Controllers*. Kontrolery odpowiadają za zachowanie się strony (załadowanie, RESTy etc.).
### Przykład
**OdczynnikiController** odpowiada za zachowanie strony po wpisaniu w pasek adresu http://localhost/labmed/public/odczynniki. 
Metoda **index()** odpowiada za załadowanie strony, \n
Metoda **create()** odpowiada za RESTową metodę PUT, \n
Metoda **destroy()** odpowiada za RESTową metodę DELETE itd.
Kontroler można utworzyć za pomocą polecenia: `php artisan make:controller nazwa_kontrollera`.

## Views
Pliki widoków można znaleźć w *resources/views/[layouts|odczynniki|pages|sprzet_jednorazowy|urzadzenia]/.blade.php*. Są to strony html z zawartymi znacznikami Laravel, które zazwyczaj przekazują informacje o przesyłanych do widoku obiektach. Pierwszym widokiem, który zostaje załadowany jest *layout/master.blade.php* - zawiera ono pole 'content', które doładowywane jest w postaci pozostałych podstron (np. odczynniki/index.blade.php).

## Models
Pliki modeli znajdują się w *app/(...).php*. Odpowiadają za połączenia między tabelami (foreign keys) bądź definiują nazwę tabeli. Modele można utworzyć za pomocą `php artisan make:model nazwa_modelu`.

## Pliki bazy danych
Migracje czyli *migrations* w Laravel to pliki, które definiują schematy tabeli w bazie danych. Znajdują się w *database/migrations*.
Uruchamianie migracji (czyli tak naprawdę stawianie bazy) odbywa się za pomocą `php artisan migrate`, a stworzenie migracji `
php artisan make:migration nazwa_migracji --create=nazwa_tabeli`.

## Przykładowa kolejność załadowania elementów
1. Plik `app/Http/routes.php` informuje, że RESTowego zapytania GET dla strony głównej projektu (http://localhost/labmed/public) ma załadować widok *home* i kontroler *PagesController*, a dokładniej metodę *home()*.
2. Załadowywany jest widok *pages/home.blade.php*, ale jako że ten widok extenduje główny widok (master) to wyświetlana jest całość.