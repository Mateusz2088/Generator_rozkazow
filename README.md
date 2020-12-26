# Generator_rozkazow
Czuwaj. W ramach próby na HO muszę zrobić generator rozkazów dla drużyn, zastępów i ewentualnie dla wyższych jednostek. Język: HTML, PHP, JAVA SCRIPT.

API:
* Przekazanie za pomocą $_POST nazwy hufca:
    hufiec="[string]"
* Przekazanie za pomocą $_POST nazwy drużyny:
    druzyna="[string]"
* Przekazanie za pomocą $_POST stopień instruktorski:
    * stopien="-"     - brak stopnia
    * stopien="pwd"   - przewodnik/przewodniczka
    * stopien="phm"   - podharcmistrz/podharcmistrzyni
    * stopien="hm"    - harcmistrz/harcmistrzyni
* Przekazanie za pomocą $_POST imienia i nazwiska:
    personalia="[string]"
* Przekazanie za pomocą $_POST numeru rozkazu:
    nr="[string]"
* Przekazanie za pomocą $_POST roku rozkazu:
    rok="[int]"
* Przekazanie za pomocą $_POST miejscowości wydania rozkazu:
    miejsce="[string]"
* Przekazanie za pomocą $_POST daty wydania rozkazu:
    data="rrr-mm-dd"
    
Pomysły na rozwój:
* Aby pobrać dane z TIPI danego harcerza należy napisać " #Imie_Nazwisko "
* Przetworzenie informacji o danym harcerzu i automatyczna integracja z TIPI.
    