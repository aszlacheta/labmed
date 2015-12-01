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

W przypadku jakichkolwiek problemów z dostępem *(access denied)* prawdopodobnie przyczyną jest brak dołączonego do GitHub'a klucza `https://help.github.com/articles/generating-ssh-keys/`
    