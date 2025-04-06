USE ete32e_2425zs_13;

CREATE TABLE IF NOT EXISTS games (
                                     id INT AUTO_INCREMENT PRIMARY KEY,
                                     title VARCHAR(255) NOT NULL UNIQUE,
    description TEXT NOT NULL,
    rules TEXT NOT NULL,
    image VARCHAR(255) NOT NULL,
    favorite BOOLEAN DEFAULT FALSE,
    releaseYear INT NOT NULL,
    difficulty INT NOT NULL,
    genre VARCHAR(100) NOT NULL,
    playerCount INT NOT NULL,
    reviewScore DECIMAL(3,1) NOT NULL
    );

CREATE TABLE IF NOT EXISTS game_images (
                                           id INT AUTO_INCREMENT PRIMARY KEY,
                                           game_id INT NOT NULL,
                                           image VARCHAR(255) NOT NULL,
    FOREIGN KEY (game_id) REFERENCES games(id) ON DELETE CASCADE
    );

CREATE TABLE IF NOT EXISTS reviews (
                                       id INT AUTO_INCREMENT PRIMARY KEY,
                                       title VARCHAR(255) NOT NULL UNIQUE,
    text TEXT NOT NULL,
    image VARCHAR(255) NOT NULL
    );

INSERT INTO games (title, description, rules, image, favorite, releaseYear, difficulty, genre, playerCount, reviewScore)
VALUES ('Mystic Realms',
        'Dobrodružná fantasy hra, ve které hráči objevují tajemná území a čelí nebezpečím, aby získali magické artefakty.',
        'Hráči se střídají v tazích, během kterých pohybují figurkami, získávají karty událostí a bojují s nepřáteli pomocí hodu kostkami.',
        'mystic_realms.png', 1, 2024, 3, 'Fantasy', 4, 8.7),
       ('Galactic Traders',
        'Ekonomická strategie zasazená do vesmíru, kde hráči obchodují se zbožím mezi planetami a snaží se ovládnout galaxii.',
        'Každé kolo probíhá fáze obchodování, přesunu lodí a vyjednávání. Cílem je nasbírat co nejvíce kreditů.',
        'galactic_traders.png', 0, 2020, 4, 'Sci-Fi', 3, 8.2),
       ('Castle Siege',
        'Historická hra zaměřená na obléhání hradů, kde se jeden tým brání a druhý útočí s různými jednotkami.',
        'Hráči si připraví obranu nebo útok, využívají balíček karet a házejí kostkami pro výsledek soubojů.',
        'castle_siege.png', 0, 2024, 2, 'Strategy', 2, 7.8),
       ('Potion Masters',
        'Rodinná hra plná magie, ve které hráči míchají lektvary, sbírají přísady a snaží se stát nejlepším alchymistou.',
        'Ve svém tahu si hráč bere ingredience z herního plánu a pokouší se zkompletovat receptury, aby získal body.',
        'potion_masters.png', 1, 2022, 1, 'Family', 4, 9.0),
       ('Expedition: LJ',
        'Dobrodružná hra, kde hráči vedou expedici skrz neprozkoumanou džungli, čelí pastem a hledají ztracený chrám.',
        'Každé kolo hráči postupují na mapě, čelí kartám nebezpečí a rozhodují se, zda pokračovat nebo se vrátit.',
        'expedition_lost_jungle.png', 0, 2021, 3, 'Adventure', 5, 8.5),
       ('Steam Rivals',
        'Strategická hra z viktoriánské éry, kde hráči soupeří o kontrolu nad parními vynálezy a továrnami v alternativní historii.',
        'Hráči získávají suroviny, staví stroje a zlepšují své impérium pomocí taktické nabídky akcí a správy zdrojů.',
        'steam_rivals.png',
        0, 2024, 3, 'Strategy', 4, 8.3),
       ('Chrono Clash',
        'Cestování časem a taktické souboje napříč epochami. Hráči vysílají jednotky do minulosti i budoucnosti a mění dějiny.',
        'Každý hráč má k dispozici sadu karet reprezentujících jednotky, události a vývoj technologie napříč čtyřmi časovými érami.',
        'chrono_clash.png',
        1, 2023, 4, 'Sci-Fi', 2, 8.9),
       ('Beast Grove',
        'Magická soutěž mezi strážci prastarého lesa, kde hráči povolávají zvířecí spojence a chrání posvátný háj.',
        'Hráči vybírají z balíčku duchů lesa, každý tah ovlivňuje rovnováhu mezi růstem a obranou, vítězí ten, kdo přežije nejvíce sezón.',
        'beast_grove.png',
        0, 2021, 2, 'Fantasy', 3, 8.0),
       ('Code Havoc',
        'Rychlá karetní hra na motivy počítačového světa, kde hráči sabotují a programují virtuální systémy v závodu o nadvládu nad síťovým uzlem.',
        'Hra probíhá v kolech, kde hráči přikládají akční karty, získávají data, brání se virům a snaží se dokončit úspěšný program.',
        'code_havoc.png',
        0, 2022, 2, 'Card Game', 4, 7.7),
       ('Skyline Syndicate',
        'V dystopickém městě budoucnosti se hráči stanou hlavami zločineckých organizací, bojují o vliv a kontrolu nad výškovými sektory.',
        'Hra kombinuje kontrolu území s vyjednáváním, hráči ovládají čtvrti, uplácejí politiky a najímají specialisty.',
        'skyline_syndicate.png',
        1, 2020, 3, 'Strategy', 5, 8.4);


INSERT INTO reviews (title, text, image)
VALUES ('Recenze: Mystic Realms',
        'Mystic Realms je výpravná fantasy desková hra, která hráče přenáší do světa plného magie, nebezpečí a epických výzev. Hra vyniká svou vizuální stránkou – od mapy po karty a figurky, vše je detailně zpracováno a podporuje ponoření do děje. Průzkum tajemných území a hledání artefaktů je napínavé a nutí hráče přemýšlet nad každým krokem. Herní mechaniky nejsou příliš složité, ale zároveň poskytují dostatek prostoru pro strategii. Systém boje na základě kostek přidává prvek náhody, ale celkově zůstává hra vyvážená. Ideální pro hráče, kteří hledají atmosférický zážitek s fantasy tematikou. Mystic Realms se skvěle hodí jak pro skupiny přátel, tak i pro rodinné hraní s trochu zkušenějšími hráči.',
        'mystic_realms.png'),

       ('Recenze: Galactic Traders',
        'Galactic Traders přináší unikátní zážitek z obchodování ve vesmíru, kde každé rozhodnutí může znamenat zisk nebo katastrofu. Hráči se vydávají na obchodní mise mezi planetami, budují ekonomické impérium a snaží se předběhnout konkurenci. Hra vyniká taktickou hloubkou a důrazem na plánování, ale zároveň nechybí ani prvek vyjednávání a blafování. Grafika hry je moderní a sci-fi prvky skvěle dokreslují futuristickou atmosféru. Silnou stránkou je rejstřík možných strategií – od agresivního růstu po diplomatické aliance. Méně zkušené hráče může zpočátku odradit komplexita pravidel, ale po jednom kole už vše běží hladce. Celkově se jedná o promyšlenou strategii, která uspokojí i náročnější publikum.',
        'galactic_traders.png'),

       ('Recenze: Castle Siege',
        'Castle Siege je výtečně vybalancovaná hra pro dva hráče, která staví jeden tým do role obránců hradu a druhý do role útočníků. Hra je svižná, přehledná a ideální pro rychlé souboje plné taktiky. Každé rozhodnutí má své důsledky – zda zvolit přímý útok, nebo obrannou lest, může rozhodnout o výsledku partie. Herní plán je jednoduchý, ale efektní, a karty jednotek nabízejí slušnou variabilitu. Atmosféra středověkého konfliktu je cítit v každé akci. Pro někoho může být hra až příliš jednoduchá na delší hraní, ale jako duelovka funguje skvěle. Ideální volba pro přátele, kteří si chtějí dát rychlý a napínavý střet.',
        'castle_siege.png'),

       ('Recenze: Potion Masters',
        'Potion Masters je rodinná hra, která kombinuje jednoduchá pravidla s vizuálně přitažlivým provedením. Hráči sbírají ingredience a snaží se namíchat co nejhodnotnější lektvary. Hra boduje především zábavnou mechanikou kombinování přísad a pestrostí receptů. Ilustrace jsou hravé a barevné, díky čemuž hra láká i mladší publikum. Velkou výhodou je její přístupnost – během pár minut ji pochopí i úplní nováčci. Přesto dokáže nabídnout dostatek výzev a důvodů ke zlepšování strategie. Ideální jako vstupní hra do světa moderních deskovek nebo jako příjemný odpočinek pro zkušenější hráče.',
        'potion_masters.png'),

       ('Recenze: Expedition: Lost Jungle',
        'Tato hra představuje ideální mix dobrodružství a strategie. Hráči vedou expedici skrz hustou džungli, objevují skryté chrámy, bojují s pastmi a rozhodují se, zda pokračovat nebo ustoupit. Vizuální stránka hry je podmanivá – zeleň džungle, mlhy a zář starobylých relikvií vytváří filmovou atmosféru. Herní mechaniky podporují zkoumání a riziko, přičemž každý tah nabízí nové volby a napětí. Skvěle funguje i prvek spolupráce i soupeření mezi hráči. Hodí se jak pro milovníky Indiana Jonese, tak i pro fanoušky tematických dobrodružství.',
        'expedition_lost_jungle.png'),

       ('Recenze: Steam Rivals',
        'Steam Rivals je pečlivě navržená strategická hra se steampunkovou tematikou. Hráči soutěží v budování parních strojů, rozšiřují svůj vliv ve městě a optimalizují výrobu. Hra exceluje v herní hloubce a v tom, jak odměňuje dlouhodobé plánování. Grafické zpracování včetně strojových detailů a městských panoramat je působivé a vtahující. Herní kolo je rozděleno do fází, které drží tok hry v pohybu a zabraňují zdlouhavým prodlevám. Je vhodná pro pokročilejší hráče, kteří si užívají budování motorů a komplexní rozhodování. Jedna z nejlepších tematických her v žánru průmyslové strategie.',
        'steam_rivals.png'),

       ('Recenze: Chrono Clash',
        'Chrono Clash přináší svěží vítr do světa deskových her s tématikou časových paradoxů. Herní plán se dynamicky mění podle časové linie a každá akce může ovlivnit minulost i budoucnost. Hráči disponují unikátními jednotkami z různých epoch, což poskytuje nepřeberné možnosti kombinací a strategie. Hra je krásně ilustrovaná, s důrazem na kontrast různých období (např. středověk vs. kyberbudoucnost). Výzvou může být pochopení složitějších interakcí mezi časy, ale pro zkušenější hráče je to osvěžující zážitek. Výborná hra pro ty, kteří hledají originální koncepty a výraznou taktickou výzvu.',
        'chrono_clash.png'),

       ('Recenze: Beast Grove',
        'Beast Grove je vizuálně nádherná hra, která v sobě spojuje strategii, atmosféru a ekologické poselství. Hráči se stávají ochránci prastarého lesa a snaží se udržet rovnováhu mezi rozvojem a obranou. Využití karet zvířat, duchů lesa a sezónních efektů dodává každé partii odlišný průběh. Mechanicky se hra řadí mezi středně náročné, ale s důrazem na emocionální zážitek. Velmi vhodná pro hráče, kteří hledají estetickou hru s klidnějším tempem a hlubším významem.',
        'beast_grove.png'),

       ('Recenze: Code Havoc',
        'Code Havoc je moderní rychlá karetní hra s digitálním nádechem. Hráči reprezentují programátory a hackery, kteří se snaží prolomit bezpečnostní systémy a ovládnout síť. Hra nabízí svižné hraní, výrazné ilustrace a zajímavý systém akčních karet. Každé kolo se rychle mění, což drží pozornost a přináší dostatek adrenalinu. Vhodná pro hraní ve větších skupinách i pro večerní zábavu. Doporučujeme hráčům, kteří mají rádi svižné a tematické karetky s jednoduchými pravidly.',
        'code_havoc.png'),

       ('Recenze: Skyline Syndicate',
        'Skyline Syndicate je strategická hra zasazená do futuristického města, kde se hráči snaží ovládnout městské čtvrti a získat vliv prostřednictvím zločinu, politiky a vyjednávání. Každý hráč vede jiný syndikát s unikátními schopnostmi. Herní systém podporuje interakci mezi hráči – obchodování, podrazy i dočasné aliance jsou na denním pořádku. Stylizovaná grafika a silný příběhový rámec z ní dělají nezapomenutelný zážitek. Výborná volba pro ty, kdo milují tematickou strategii s vysokou mírou vlivu hráče na vývoj partie.',
        'skyline_syndicate.png');