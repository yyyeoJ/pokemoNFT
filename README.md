# Történet
Pokémonok szabadultak be a világunkba! Az NFT kereskedők természetesen gyorsan meg is ragadták az alkalmat, és nekiláttak, hogy elkészítsék a kereskedelem legkézenfekvőbb módját, egy weboldalt. Mindegyikük megkereste egy-egy ismerősét a következő módon:

"Figyelj, van egy biznisz ötletem, szerintem simán leprogramozod két hét alatt. Jaaa hát büdzsém az nincs rá... nem, tervem sincs nagyon, de már elképzeltem, hogy milyenek lennének a színei, a többit majd megoldod. Micsoda, ennyibe kerülne?? Dehát a GPT már jobban programoz, bárki meg tudja csinálni ingyen... Mi, hogy én miért nem? Hát te vagy a programozó. Nem, nem fogok fizetni, de meghívlak egy kólára."

A te egyik ismerősöd is megkeresett, lezajlott egy hasonló beszélgetés, és a végén megegyeztetek, hogy a te feladatod lesz elkészíteni a weboldalt, ő pedig lesz az alapító

# Alap funkciók
Egy PHP-ban írt szerveroldali alkalmazás készítése a feladatod, amelyben felhasználók Pokémon kártyákkal tudnak kereskedni. Ezen két adatstruktúra (kártyák, felhasználók) lehetséges tárolási formájáról lentebb, a segítség részben olvashatsz, de természetesen másképp is felépítheted az adataidat.

Az adatok közé előre fel kell venni Pokémon kártyákat.
A felhasználók közé fel kell venni egy admin felhasználót, akinek a belépési adatai rögzítettek, és kereskedőként funkcionál. Részleteket ld. az Admin funkcióknál.
Egy kártya csak egy felhasználóhoz tartozhat, de egy felhasználó több kártyát is birtokolhat.
Feltöltöttünk egy kiinduló csomagot, hogy segítsük a munkát (kis HTML meg CSS, hogy könnyebb legyen elképzelni). Valamiért a kiinduló csomaghoz nem fértek hozzá. Teamsen a fájlok közt fent van (illetve kommentben a beadandó threadjében).

## Főoldal / Listaoldal
A lista oldalon, avagy a főoldalon statikus szöveggel jelenjen meg egy cím és egy rövid ismertetés.
A főoldal elérhető azonosítatlan felhasználók számára, akik szabadon tudják böngészni az itt megjelenő tartalmakat.
A lista oldalon legyenek kilistázva a rendszerben létező Pokémon kártyák.
A Pokémon kártyákhoz tartozzon egy link (ez akár egy képen is rajta lehet), ami az adott Pokémon kártya részletező oldalára vezet.
Ha a felhasználó be van jelentkezve, legyen elérhető egy vásárlás gomb azokon a kártyákon, amelyek az adminhoz tartoznak. A felhasználó megvehet egy kártyát, ha van elég pénze, és ha még nem ért el egy kártyalimitet (pl. 5 kártya).
Ha a felhasználó be van jelentkezve, akkor egy linken keresztül legyen elérhető a "Felhasználó részletek" oldal.
## Kártya részletek
A Pokémon kártya részletek oldalon jelenjen meg az adott kártyán szereplő szörny neve, a hozzá tartozó kép, a szörny tulajdonságai, a kártya leírása.
Az oldalon egy jól látható mező (pl. a kép háttere, oldal háttere) színe változzon a kártyán szereplő szörny eleme szerint. Pl.: Fire esetén piros, Lightning esetén sárga, stb.
Innen is lehessen elérni a főoldalt, esetlegesen a többi menüelemet.
## Felhasználó részletek
Az oldalon listázódnak a felhasználó adatai és saját kártyái.
A felhasználó eladhatja bármely kártyáját az ár 90%-áért az adminnak (visszavásárlás). Az eladott kártya visszakerül az admin felhasználóhoz.
## Hitelesítési oldalak
A főoldalról legyen lehetőség elérni a bejelentkező és regisztrációs oldalt.
Regisztráció során meg kell adni felhasználónevet, az e-mail címet és a jelszót kétszer. Mindegyik kötelező, a felhasználónév legyen egyedi, az e-mail cím formátuma legyen helyes, a jelszavak pedig egyezzenek. Sikeres regisztráció esetén a felhasználó kapjon x mennyiségű pénzt (ezt az összeget ajánlott beleégetned a kódba, mert úgyis azt szeretnénk, hogy minden user ugyanannyi pénzt kapjon).
Regisztrációs hiba esetén jelenjenek meg hibaüzenetek! Az űrlap legyen állapottartó! Sikeres regisztráció után a felhasználó kerüljön bejelentkezve a főoldalra.
A bejelentkezés során a felhasználónévvel és jelszóval tudjuk azonosítani magunkat.
A bejelentkezés során előforduló hibákat az űrlap fölött jelezd! Sikeres belépés után kerüljünk a főoldalra!
## Admin funkciók
Legyen egy speciális felhasználó, az admin (felhasználónév: admin, jelszó: admin).
Az admin felhasználó tudjon új kártyát létrehozni.
Az admin felhasználónak akárhány kártyája lehet.
Az admin felhasználó nem vásárolhat kártyát.
## Extra funkciók
Ld. a pontozást!

## További elvárások
Fontos az igényes megjelenés. Ez nem feltétlenül jelenti egy agyon csicsázott oldal elkészítését, de azt igen, hogy 1024x768 felbontásban az oldal jól jelenjen meg. Ehhez lehet minimalista designt is alkalmazni, lehet különböző háttérképekkel és grafikus elemekkel felturbózott saját CSS-t készíteni, de lehet bármilyen CSS keretrendszer segítségét is igénybe venni.
A bevitt adatokat szerveroldalon kell ellenőrizni, a kérés végső feldolgozásakor. Az űrlapokelemeinek attribútumai közé vegyük fel a novalidate attribútumot is, hogy kikapcsoljuk a böngésző validálását!
Az elkészült feladatot tömörítve, az összes szükséges állománnyal, illetve a program gyökérmappájában elhelyezett README.md fájllal együtt legkésőbb a határidőig kell feltölteni a Canvas rendszerbe.
A megvalósításához NEM használható semmilyen keretrendszer, külső PHP függvénykönyvtár. Legfeljebb CSS keretrendszerek használhatók.
A README.md fájlt maradéktalanul ki kell tölteni (ld. pontozás alatt).
Segítségek
Tervezés
Szeretnénk azoknak is segítséget nyújtani, akiknek nehezebb egy nagyobb feladatot átlátni, megtervezni. Lehet az egész feladatot előre megtervezni, és utána fejleszteni, de az alábbi lépések kisebb részfeladatok megoldásánál is használhatók:

Készítsd el a fejlesztendő alkalmazás statikus HTML prototípusát! Azaz első lépésben csak HTML és CSS segítségével tervezd meg a lista oldalt, a kártya részletező oldalt, stb. Vannak olyan oldalak, ahol vannak feltételes információk, ezeket is tervezd meg, majd később PHP-val eltünteted. A CSS-t is ki tudod próbálni statikusan, pl. a lista oldalon, hogy a kártyák hogyan jelenjenek meg, ezt statikusan beégetheted. Az egyes oldalakat linkekkel kötheted össze.
Gondold át, hogy milyen adatokra lesz szükséged. Mit kell tárolni, azokban milyen mezőket?
Hol tárolod a felhasználókat?
Hol tárolod a kártyákat?
Hogyan tárolod azt, hogy melyik felhasználóhoz mely kártyák tartoznak? Alapvetően két lehetőséged van:
A felhasználó adatai között tárolod a megvásárolt kártyáit, kártyaazonosítóit.
A kártyánál tárolod, hogy melyik azonosítójú felhasználóhoz tartozik.
Gondold át, hogy az előbb megtervezett adatszerkezetekből hogyan tudod az oldalaid számára a megfelelő adatokat kinyerni? Készíts ezekhez egy-egy függvényt, de sokkal jobb, ha ezeket az adott Storage osztály metódusaiként implementálod.
Hogy kapod vissza egy felhasználó kártyáit?
Hogyan adhatsz át egy kártyát egy másik felhasználónak?
Űrlapoknál két utat kell bejárni:
Siker esetén mi történjen?
Hibát hogyan érzékelem, hogyan jelenítem meg, hogyan lesz űrlap állapottartó?
Adattárolás
Adatok: A feladatban kétféle adat van: Pokémon kártya és Felhasználó.
A Pokémon kártyáknak a következő adatait kell tárolni:
A kártyán szereplő Pokémon neve
A kártyán szereplő Pokémon szörny életereje/HP-ja
A kártyán szereplő Pokémon eleme
A kártyán szereplő Pokémon támadó ereje
A kártyán szereplő Pokémon védekezése
Kártya ára
A kártyán szereplő Pokémon leírása (opcionális)
Kép a kártyáról - ez lehet képfájl elérési útvonala vagy képcím (opcionális)
(esetleg melyik felhasználóhoz tartozik)
Felhasználó adatai:
Felhasználó neve
Felhasználó e-mail címe
Felhasználó jelszava
Felhasználó pénze
Admin jogosultság
(esetleg a Felhasználó kártyái)
Ezen az oldalon minden eddigi Pokémon kártya fent van, innen lehet inspirációt meríteni: https://www.pokemon.com/us/pokemon-tcg/pokemon-cards/ (Linkek egy külső oldalra)
Példa a kártyák tárolására. Nagyon erősen javasolt az órán mutatott Storage osztályt használni, nem pedig nulláról megírni! Ez a példa csak segítség, át kell alakítani, hogy azon osztállyal működjön!

# Pontozás

### Minimálisan teljesítendő (enélkül nem fogadjuk el, 6 pont)
* [X] `0.0 pont` Readme.md fájl: kitöltve, feltöltve
* [X] `0.0 pont` Főoldal: megjelenik
* [X] `1.0 pont` Főoldal: összes kártya listázása, pl. képekkel
* [X] `1.0 pont` Főoldal: a kártya nevére kattintva a megfelelő kártya részletek oldalra jutunk
* [X] `1.0 pont` Kártya részletek: Megjelenik a kártyán szereplő szörny neve, életereje, leírása és eleme
* [X] `0.5 pont` Kártya részletek: Megjelenik a kártyához tartozó kép
* [X] `0.5 pont` Kártya részletek: A kártyán szereplő szörny eleme szerint változik az oldalon egy vagy több elem színe vagy háttérszíne, pl.: Fire esetén piros, Lightning esetén sárga, stb.
* [X] `2.0 pont` Admin: Új kártya létrehozása: hibakezelés, sikeres mentés


### Az alap feladatok (14 pont)
* [X] `0.5 pont` Regisztrációs űrlap: Megfelelő elemeket tartalmazza
* [X] `0.5 pont` Regisztrációs űrlap: Hibás esetek kezelése, hibaüzenet, állapottartás
* [X] `0.5 pont` Regisztrációs űrlap: Sikeres regisztráció
* [X] `0.5 pont` Bejelentkezés: Hibás esetek kezelése
* [X] `0.5 pont` Bejelentkezés: Sikeres bejelentkezés
* [X] `0.5 pont` Kijelentkezés
* [X] `0.5 pont` Főoldal: Megjelenik a felhasználó neve és pénze
* [X] `0.5 pont` Főoldal: A felhasználónévre kattintva a felhasználó részletei oldalra jutunk
* [X] `1.0 pont` Főoldal: Lehessen a kártyákat típus szerint szűrni.
* [X] `0.5 pont` Felhasználó részletek: Megjelenik a felhasználó neve, e-mail címe, pénze
* [X] `0.5 pont` Felhasználó részletek: Megjelennek a felhasználóhoz tartozó kártyák
* [X] `2.0 pont` Felhasználó részletek: A felhasználó kártyái mellett megjelenik egy eladás gomb, amivel a felhasználó el tudja adni az adott kártyát, ekkor törlődik a kártyái közül az eladott lap és megkapja a kártya árának 90%-át. Az eladott lap visszakerül az ADMIN paklijába. (Azt hogy az eladás gombot hova helyezed és hogyan valósítod meg rád van bízva)
* [X] `0.5 pont` Admin: Be lehet jelentkezni az admin felhasználó adataival
* [X] `0.5 pont` Admin: Új kártya létrehozása csak Admin felhasználóval érhető el
* [X] `0.5 pont` Főoldal: Ha be van jelentkezve jelenjen meg egy vásárlás gomb minden kártya alatt
* [X] `1.5 pont` Főoldal (Vásárlás): Meg tudja venni a kártyát
* [X] `0.5 pont` Főoldal (Vásárlás): Csak annyit tud venni amennyi pénze van
* [X] `0.5 pont` Főoldal (Vásárlás): Legfeljebb 5 kártyája lehet
* [X] `1.0 pont` Igényes kialakítás

### Plusz feladatok (max plusz 5 pont)
* [ ] `0.5 pont` Admin: Kártya módosítása: admin felhasználóval elérhető, még el nem adott kártyák esetén
* [ ] `0.5 pont` Admin: Kártya módosítása: hibakezelés, állapottartás, sikeres mentés
* [ ] `1.0 pont` Főoldal: A főoldal egy gombra kattintva a nem admin felhasználók tudjanak venni egy véletlenszerű kártyát a pénzükből, egy random kártya ára lehet pl.: 50 coin.
* [ ] `2.0 pont` Főoldal: A főoldalon egyszerre csak 9 kártya jelenjen meg, alattuk lehessen navigálni az oldalakon (oldalszámokkal, nyilakkal). Mindig az aktuális oldalszámnak megfelelő kártyák jelenjenek meg, minden oldalon a következő 9 kártya. A megoldáshoz használj AJAX-ot/fetch-et.
* [ ] `1.0 pont` Csere 1. lépés: A főoldalon azoknál a kártyáknál, amely nem az adminnál és nálunk van jelenjen meg egy csere gomb, amire kattintva önhatalmúlag cserélhesse el ezen kártyára egy tetszőleges kártyáját a felhasználó. 
* [ ] `1.0 pont` Csere 2. lépés: A csere ne azonnali és önhatalmú legyen, hanem a másik fél kapjon róla értesítést, és fogadhassa vagy utasíthassa el.
* [ ] `1.0 pont` Csere 3. lépés: A cseréhez lehessen pénzt is hozzáadni bármely oldalra. Figyelj a negatív számokra!
