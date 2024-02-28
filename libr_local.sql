-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Время создания: Фев 28 2024 г., 18:29
-- Версия сервера: 10.4.32-MariaDB
-- Версия PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `libr.local`
--

-- --------------------------------------------------------

--
-- Структура таблицы `libraries`
--

CREATE TABLE `libraries` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `link` varchar(50) NOT NULL,
  `telephone` varchar(10) NOT NULL,
  `site` varchar(50) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `history` text NOT NULL,
  `is_published` tinyint(1) NOT NULL,
  `created_at` date NOT NULL DEFAULT current_timestamp(),
  `updated_at` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Дамп данных таблицы `libraries`
--

INSERT INTO `libraries` (`id`, `name`, `address`, `link`, `telephone`, `site`, `photo`, `history`, `is_published`, `created_at`, `updated_at`) VALUES
(3, 'Областная универсальная научная библиотека им. С. Торайгырова', 'г. Павлодар, ул. Академика Сатпаева, 104', 'https://go.2gis.com/7wge9', '7182320165', 'https://library-584.business.site/', '1709054351.png', 'Quam possimus non t', 1, '2024-02-27', '2024-02-27'),
(4, 'Центральная детская библиотека им. М. Жаманбалинова', 'г. Павлодар, ул. Малайсары Батыра, 2', 'https://go.2gis.com/7wge9', '7182549304', '', '1709054551.png', 'Quam quis aliquip se', 0, '2024-02-27', '2024-02-27'),
(5, 'Библиотека им.Дихана Абилева', 'г. Павлодар, ​ул. Теплова, 38/2', 'Distinctio Reprehen', '7182204401', '', '1709054567.png', 'Sit officiis qui opt', 1, '2024-02-27', '2024-02-27'),
(6, 'Инновационный Евразийский Университет', 'Улица Горького, 120/2, Павлодар городская администрация', 'https://go.2gis.com/7wge9', '7182314230', 'www.ineu.edu.kz', '1709056463.png', '', 1, '2024-02-27', '2024-02-27');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`) VALUES
(1, 'Вероника', 'nika@libr.kz', '$2y$10$YjRiMmNhZDVhYzcxNzJhYOphnTlEK0LP8hlgRrijtDHfl6SVLZBi6');

-- --------------------------------------------------------

--
-- Структура таблицы `writers`
--

CREATE TABLE `writers` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `biography` text NOT NULL,
  `photo` varchar(255) NOT NULL,
  `years` int(9) NOT NULL DEFAULT 0,
  `is_published` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Дамп данных таблицы `writers`
--

INSERT INTO `writers` (`id`, `name`, `biography`, `photo`, `years`, `is_published`, `created_at`, `updated_at`) VALUES
(57, 'Абилев Дихан', 'Поэт, драматург, прозаик, публицист, переводчик, Народный писатель Казахстана. Дихан Абилев родился в семье бедняка-скотовода 26 декабря 1907 года в Баянаульском районе в местечке Мойылды булақ. С юных лет впитывал он душой и сердцем красу родного края, и она живительной силой вошла потом в его замечательные стихи и песни, органично влилась в его многогранное и разностороннее творчество.Семья поэта переехала в город Семипалатинск. Начав свое обучение в школе аула, будущий поэт продолжил его в средней общеобразовательной школе Семипалатинска, которую успешно закончил в 1924 году. Окончив Семипалатинский сельскохозяйственный техникум, он работал в советских учреждениях, учительствовал в начальной школе.В 1926 году в семипалатинской областной газете «Қазақ тілі» появились первые стихи Д. Абилева «Красной Армии». В 1932–1934 годах он заведовал отделом партийной жизни в редакции карагандинской областной газеты «Ленин туы». В 1937 году Д. Абилев окончил Казахский коммунистический институт журналистики. После окончания учебы в 1939-1940 годах Д. Абилев работает ответственным секретарем, а позже председателем правления Союза писателей Казахстана, главным редактором Казгослитиздата, директором Казахского отделения Литфонда СССР. В 1937 году вышел первый сборник стихов поэта «Куат». А в 1938 году – первое крупное произведение поэма «Шалкыма» о сыне бедняка, ставшем борцом за новую жизнь.А вот за поэму «Майданбек», написанную в 1943 году Дихана Абилева чуть не расстреляли. Несколько дней, проведенных в ожидании смерти, он так и не смог забыть. В поэме речь шла о простом пареньке-коневоде, никогда не державшем в руках оружия. Молодой джигит, оказавшись на передовой, не мог заставить себя стрелять в бегущих на него немцев. Он никак не мог понять: «Как человека так просто может убить человек?». Отрывки из поэмы напечатала фронтовая газета «Вперед, на врага» и они пришлись по душе многим бойцам. Но не понравились некоторым военачальникам.В Политуправление фронта поступила бумага. Один из «доброжелателей» особенно негодовал по поводу пацифистской настроенности поэмы: \"Подобное мнение, — подчеркивал некий военачальник, — абсолютно чуждо нам, советским людям. В поэме Абилева допущено ошибочное, противоречащее нашим взглядам утверждение о том «как человек убивает человека. Мнения такого характера могут сеять панику, несогласие и даже раздор среди рядовых бойцов. Вот к чему призывает Абилев, проповедующий вредные идеи. Ему нельзя не только верить, но и необходимо строго наказать…». И автора поэмы исключили из партии и приговорили к расстрелу. Спас Д. Абилева генерал Дребеденев. Он прочитал поэму в переводе Малика Габдуллина, разобрался во всем досконально и отменил приговор военного трибунала. К сожалению, Д. Абилеву так и не удалось разыскать генерала, спасшего ему жизнь. Об этом случае Малик Габдуллин написал замечательный рассказ-воспоминание «Страх, закончившийся радостью».Д. Абилев был участником войны и с японскими милитаристами. За ратные подвиги он награжден орденами Отечественной войны 1-й степени и Красной Звезды, медалями.После демобилизации Д. Абилев – один из руководителей творческого союза. Писатель глубоко исследует тему военного подвига народа, о чем свидетельствуют его повесть в стихах «Солдат степей», поэмы «Жасыбай батыр» и «Майданбек»; жизни бойца-публициста Баубека Булкишева, погибшего на фронте, посвящена поэма «Судьба любви». Д. Абилев известен и как автор произведений исторической прозы. В 1981 году вышел в свет его роман-трилогия о судьбе казахского поэта-демократа С. Торайгырова «Султанмахмут» («Мечта поэта», 1965; «Путь мечты», 1969; «В отрогах Баянаула», 1975). Казахские композиторы Л. Хамиди и Б. Байкадамов написали песни на стихи Дихана Абилева «Песня радости», «Родина» и другие. А его драматические произведения пьесы «Друзья-однополчане», «Майра», «Горячее сердце» ставились на сценах театров республики.За долгую творческую жизнь Диханом Абилевым написано немало поэтических и прозаических произведений, которыми зачитывалось не одно поколение казахстанцев. Они стали достоянием и других народов, были переведены и изданы на русском, украинском, армянском и многих других языках.Современного писателя нельзя представить вне связи с литературой других народов. Эти качества присущи и творчеству Дихана Абилева. Он много и плодотворно работает над переводами произведений русских писателей. По душе пришелся ему русский поэт Николай Алексеевич Некрасов. Переведенные поэтом поэмы «Мороз-Красный нос», «Кому на Руси жить хорошо» пришли к казахскому читателю в своей первозданной чистоте и силе, сохранив все характерные особенности стиля великого поэта. Переводческая деятельность Д. Абилева – еще одно яркое свидетельство большого, неувядающего таланта.', '1708358029.jpg', 19072003, 1, '2024-02-19 21:53:49', '0000-00-00'),
(58, 'Аймауытов Жусупбек', 'многожанровый писатель, основоположник драмы и романа на казахском языке, учёный, просветитель, педагог, психолог. Автор учебников «Тәрбиеге көмекші» (Пособие для воспитателя), «Психология», «Жан жүйесі және өнер таңдау». Родился в 1889 году в Баян-Аульском районе Павлодарской области. Жил в бедной семье, но его прадеды Дандебай и Куан были уважаемыми и образованными людьми из знатного рода. С детства обучался арабской грамоте, кузнечному делу и резьбе по дереву. В 18 лет Жусипбек одну зиму проучился в русской школе, затем два месяца в казённой сельскохозяйственной школе, из которой был исключен. В 1914 году поступает в Семипалатинскую учительскую семинарию, которую заканчивает в 1919 году. Здесь он знакомится с Канышем Сатпаевым и Мухтаром Ауэзовым. Учась в семинарии, Жусипбек Аймауытов работал чеканщиком, столяром, плотником, сапожником, изготовлял домбры. В 1911—1914 годах аульный учитель, в 1919—1922 — член коллегии Наркомпроса республики, начальник Семипалатинского губернского отдела просвещения, редактор газеты «Қазақ тілі». В 1922—1924 годах учитель в Каркаралах, в 1924—1926 — литературный сотрудник газеты «Ак жол» (Ташкент), в 1926—1929 — директор Шымкентского педагогического техникума. В 1929 году он переезжает в Кызыл-Орду для работы в газете «Енбекші қазақ». Его статьи не понравились властям, и вскоре он был арестован по ложному обвинению в присвоении пожертвований, выделенных для голодающих Тургая, Кустаная, Актобе. Был оправдан. Но через непродолжительное время Аймауытов был снова арестован уже по обвинению в контрреволюционной деятельности, препровожден в Москву. Осужден Коллегией ОГПУ и расстрелян в апреле 1931 года. Посмертно реабилитирован в 1988 году.', '1708358069.jpg', 18891930, 1, '2024-02-19 21:54:29', '0000-00-00'),
(59, 'Акишев Зейтин', '\"Зейтин Акишев (литературный псевдоним З. Аралов) – известный казахский писатель, драматург, переводчик, педагог, член Союза писателей Казахстана. Родился 18 апреля 1911 г. в селе Екпинди Баянаульского района Павлодарской области. Родители будущего писателя были бедняками, они умерли в голодные 30-е годы, когда мальчик учился на рабфаке при сельскохозяйственном техникуме в г. Омске. Юного Зейтина увлекала математика, он участвовал в различных математических конкурсах и олимпиадах. После окончания рабфака он поступил в пединститут на физико-математический факультет в г. Семипалатинске. В разные годы работал учителем математики, директором Баянаульской школы, заведующим районо, преподавателем Павлодарского педучилища. Будучи директором школы, сам ходил по аулам, убеждал родителей отдавать детей в школы вместо того, чтобы отправлять их пасти скот. Учителей катастрофически не хватало, ему приходилось помимо математики и физики преподавать географию, историю и литературу.\r\n Его первые стихи, очерки, рассказы были опубликованы в 1930 г. на страницах районных и областных газет. В годы Великой Отечественной войны на посту заведующего Павлодарским облоно способствовал созданию и открытию в Павлодаре областного историко-краеведческого музея.\r\n \r\n В 1941 г. начались преследования писателя по сфабрикованному делу, ему пришлось с семьей переехать в Семиречье, в Талдыкурганскую область. Там он работал директором школы, заведующим облоно. Зейтин Акишев зарекомендовал себя как грамотный специалист, прекрасно владеющий казахским и русским языками. Его заметили, а когда в Алма-Ате создавалась первая газета для учителей «Қазақстан мұғалімі», пригласили на должность главного редактора.\r\n \r\n В Алма-Ате он опубликовал свой первый роман «Акбельский перевал». В нем описывались революционные события на Павлодарщине, советизация казахского аула на примере судеб простых людей. Зейтин Акишев знал многих очевидцев, сам был участником многих событий, поэтому книга имеет и историческое значение. \r\n Его следующий роман «Жаяу Муса» посвящен земляку писателя – народному акыну-импровизатору и композитору Жаяу Мусе Байжанову. Жаяу Муса часто сопровождал Чокана Валиханова в его поездках, был с ним в Омске, у него научился русскому языку. Многие годы своей жизни Зейтин Акишев посвятил изучению и воссозданию личности Жаяу Мусы. Заслугой романа стали эпизоды, которые расширяют наше представление о социальной жизни казахов XIX в. Жизнь главного героя романа Жаяу Мусы трагична и романтична, писателю стоило огромных усилий создать литературный образ человека, который был и композитором, и певцом, и поэтом, и мастером на все руки. Роман получился интересным и захватывающим, образ Мусы Чорманова – султана Баянаульского округа, полковника русской службы и незаурядного человека, по мнению критиков того времени, стал большой творческой удачей автора. Роман о жизни любимого народом акына на русский язык перевел писатель Иван Щеголихин.\r\n Зейтин Акишев – также автор романов «Вдовы», «После градобития», «Ветвь чинары», сборника рассказов и повестей «Друзья мои», пьес «Жаяу Муса», «Невестки», «Не уйдет» (неоднократно ставились на сценах театров республики).\r\n \r\n Основными темами произведений писателя являются – жизни и судьбы простых людей, их самоотверженный труд в тылу в годы Великой Отечественной войны, творческий путь народных акынов.\r\n Историко-биографический роман «Веточка платана» посвящен батыру-бунтовщику, акыну, певцу и композитору Иманжусупу Кутпанову. Многие страницы из романа цензура тех времен вычеркнула и не допустила к печати, запретив даже его первоначальное название – «Иманжусуп». Назвав свой роман «Веточка платана», писатель объяснил это тем, что сам Иманжусуп сравнивал себя с веточкой платана, которая неудобна и хлещет по глазам. На самом деле название глубоко символично и во многом перекликается с судьбой самого писателя, который, не боясь прослыть националистом, возрождал из небытия имена талантливых сынов казахского народа.\r\n \r\n Зейтин Акишев пробовал себя и в качестве переводчика. Перевел на казахский язык повесть «Кружилиха» Веры Пановой, «Поединок» Александра Куприна, «Трясина» Якуба Коласа и др.\r\n \r\n Умер Зейтин Акишев в 1991 году в Алматы. Его многочисленные рукописи говорят о том, что он был не только писателем, но и исследователем, аналитиком, старался записывать все. В некоторых блокнотах он записал генеалогию своей жизни, которую сам исследовал и изучил. Архивы писателя - это огромное количество записных книжек, блокнотов, рукописей не только на казахском, но и на арабском языках. Его творчество – это достойный вклад в казахскую литературу.\"', '1708358102.png', 19111991, 1, '2024-02-19 21:55:02', '0000-00-00'),
(60, 'Алимбаев Музафар', '\"Музафар Алимбаев знаменит своими стихами, в которых воспета красота Казахстана, величие простых тружеников, произведениями для детей. Судьба отвела ему долгий жизненный путь — 95 лет прожил писатель, подарив казахской литературе прекрасные сказки и стихи. Маралды! Это звучное слово не раз воспевалось в песнях, легендах, стихах. «Маралды» - в переводе с казахского означает место, где водятся маралы. Когда-то в древности эти прекрасные создания природы паслись здесь, а потом исчезли, вымерли и только совсем недавно лесные красавцы маралы стали появляться в тугаях. Много здесь маленьких пресных озер и ручьёв, островков, кустарников. В середине этой чаши - соленое озеро Маралды. Совсем недалеко находится село, которое тоже называется Маралды.\r\n \r\n Именно здесь, в селе Маралды Щербактинского района 19 октября 1923 года родился известный казахский поэт, пишущий одинаково талантливо и для взрослых и для детей - Музафар Алимбаев. Имя «Музафар» арабского происхождения, оно означает «победитель». Быть может, отец желал видеть сына сардаром-полководцем, но сын стал поэтом.\r\n \r\n Мать будущего поэта знала множество песен и поэм, она впервые познакомила Музафара с поэзией великого Абая. Ещё ребёнком он знал наизусть народные поэмы - \"\"Еңлік-кебек\"\" и \"\"Қалқаман-батыр\"\", Она же просила аульчан, выезжающих в город, привозить небольшие книжечки, набранные арабским шрифтом. Были среди них сказки Толстого, стихи Пушкина, Лермонтова. Мать Музафара Алимбаева знала много колыбельных и героических песен, мудрых сказок и легенд. Со слов матери он записал «Сказку об одном хане-бездельнике».\r\n \r\n «Жил-был хан-бездельник. Он всегда искал необычные забавы для себя. Однажды хан приказал: - Пусть каждый джигит моего ханства схватит за бороду своего отца и пройдёт перед моим взором. Услышав это, один сирота-мальчик, бывший на побегушках во дворце властелина, мимоходом заметил: - Хан дурачится. Хан рассвирепел и приказал своим палачам повесить сорванца. Мальчик не растерялся: - Я, великий хан,- ответил он, - сказал совершенно обратное. Мудрый визирь растолковал хану, что мальчик уговаривал его отказаться от дурного поступка. Одно слово может погубить или спасти от верной смерти. Красноречие и находчивостъ - очень большое искусство».\r\n \r\n Мама была первой и самой умной и строгой учительницей жизни.\r\n \r\n Два старших брата и отец рано выучили Музафара грамоте, в пять лет он уже хорошо читал. В первом классе он не учился, его сразу зачислили во второй, так как к тому времени он уже усвоил школьные предметы для первого класса.\r\n \r\n Рано лишился Музафар родителей: когда ему было 9 лет, умер отец, а через 5 лет умерла, проболев всего семь дней, мать. Затем М.Алимбаев воспитывался в интернатах, но на всю жизнь запомнил родные края, родителей, аульчан и постоянно обращался к ним в своих произведениях.\r\n \r\n Окончив аульную школу, Музафар Алимбаев поступил в Павлодарское русско-казахское педагогическое училище Лам он впервые пробует сочинять стихи, посещает литературный кружок училища.18 июня 1939 года в областной газете «Кызыл Ту» появилась первая публикация - стихотворение, посвященное М.Горькому.\r\n \r\n Началась война, и 18-летний комсомолец Музафар Алимбаев добровольцем уходит на фронт. Был рядовым солдатом, заместителем командира минометной батареи тяжелых самоходных установок, офицером штаба учебной танковой части, На фронте он продолжает писать, его стихи публиковались в республиканской газете «Социалистик Казахстан», в газетах Калининского и Волховского фронтов. В звании старшего лейтенанта демобилизовался в 1948 году.\r\n \r\n С конца сороковых годов М.Алимбаев стал профессионально заниматься литературным творчеством. Будучи студентом Казахского университета, он показал свои переводы стихов Пушкина взыскательному мастеру Габиту Мусрепову. Стихи удостоились отметки \"\"отлично \"\" и были опубликованы в республиканской печати. В 1952 году выходит в свет его первая книга \"\"Песня о Караганде\"\", посвященная труду шахтеров. В последующие годы были изданы книги; \"\"Моему сверстнику\"\" (1954), \"\"Мой Казахстан \"\" (1963), \"\"И мы юными были \"\"(1966), «Ая и луна» (1978) и др.\r\n \r\n В поэзии Музафара Алимбаева всё доступно, все может стать его предметом, любые проявления жизни. Эпизоды из жизни детей, своих и незнакомых, неприметные, на первый взгляд детали, нечаянно услышанный разговор - на этом материале строит поэт свои произведения.\r\n \r\n Музафар Алимбаев не только пишет стихи, сказки, но и собирает народные пословицы, присказки, небылицы, поговорки, причем не только казахские, но и других народов: \"\"Кто не удержится в седле? Тот не удержится и на троне\"\", \"\"Не будет рука щедрой, коль душа скупа\"\", \"\"Коли певец искусен, то и песня прекрасна \"\". Такие пословицы он создал, используя свой жизненный опыт и наблюдения. Издал книгу «666 пословиц и поговорок».\r\n \r\n Написано около 200 песен на стихи Музафара Алимбаева, которые любимы народом и очень часто исполняются. Среди них такие песни: \"\"Ну и чудной же ты, джигит\"\", \"\"У нас есть девушка - врач\"\", \"\"Один молодой казах\"\".\r\n \r\n В 1948-1958 годах Музафар Алимбаев работал в редакции журнала \"\"Пионер \"\"(на казахском языке). А в 1958 году стал главным редактором нового детского журнала \"\"Балдырған\"\". В журнале печатались новые произведения детских писателей Казахстана, казахские народные сказки и сказки народов других стран, интересные игры, головоломки, кроссворды. Десять лет, с 1958 по 1968 год, проработал М.Алимбаев редактором журнала, полюбившегося многим детям.\r\n \r\n Музафаром Алимбаевым переведены на казахский язык многие произведения Пушкина, Лермонтова, Маяковского, Назыма Хикмета и многих других.\r\n \r\n Много книг написал Музафар Алимбаев. Они переведены на русский, украинский, польский, английский - всех языков не перечислить! За книгу стихов и сказок \"\"Хозяйка воздушных дорог\"\" Музафару Алимбаеву присуждена Государственная премия Казахской ССР.\"', '1708358147.jpg', 19232017, 1, '2024-02-19 21:55:47', '0000-00-00'),
(61, 'Альсеитов Кудайберген', '\"Кудайберген Альсеитов родился в ауле Каратерек Железинского района. Некоторое время Кудайберген учился в медресе муллы Химади в Татарском районе Новосибирской области. В 11-12 лет его называли «бала-акын». В таком юном возрасте он был известен в Северном Казахстане, Омской области. Уже к 16-ти годам Кудайберген приобрел известность как одаренный акын-импровизатор. В 1900 году он участвовал в айтысе с популярным тогда акыном Кокшетауской области Ибраем Сандыбаевым, затем был айтыс с девушкой Хадишой. Оба айтыса с 1941 года неоднократно печатались в сборниках поэтов-импровизаторов. Произведения Кудайберген в основном исполнял сам в сопровождении домбры. С импровизированными концертами выступал во многих аулах Павлодарской, Кокчетавской, Акмолинской, Семипалатинской областей, а также на ярмарках: Кояндинской, Караоткельской.\r\n \r\n Имя Кудайбергена Альсеитова и его творчество много лет несправедливо замалчивалось. Причина в том, что акын был человеком независимым, глубоко верующим и никогда этого не скрывал. В текстах его песен неоднократно встречаются упоминания Аллаха, Бога. Религиозные взгляды акына, отразившиеся в его произведениях, были причиной недоброжелательного отношения властей к поэту. Недолюбливали его богатые и влиятельные сородичи, о корысти и жадности которых акын не стеснялся петь и говорить.\r\n \r\n Кудайбергену пришлось столкнуться с несправедливостью и в личной жизни. Его любимая девушка Танакоз была насильно выдана замуж за старика и умерла от тоски и горя. Ей Кудайберген посвятил песню «Танакоз», которая входила в репертуар многих его современников.\r\n \r\n Мелодии песен Альсеитова основаны на лёгкой ритмике, присущей жанру терме. Его популярные музыкальные произведения, такие как «Песня Кудайбергена», «Терме Кудайбергена», «Айтыс Кудайбергена с девушкой Хадишой» полюбились народу и сохранились по сей день.\r\n \r\n В сборники стихов акына вошли около двадцати крупных произведений Альсеитова. Из них два знаменитых айтыса, в которых певец рассказывает о своем крае, знатных, одаренных, добрых людях. По словам очевидцев, акын Кудайберген - неповторимая, одаренная личность. Альсеитов мог часами без запинки излагать мысли в стихотворной форме, буквально приковывая внимание слушателей.\r\n \r\n Активным популяризатором творчества акына был Иса Байзаков. Имя Кудайбергена Альсеитова присвоено одной из улиц села Железинки, где установлен бюст (1994).\r\n \r\n Умер акын в 1933 году в ауле Жуматай Черлакского района Омской области.\"', '1708358181.jpg', 18841933, 1, '2024-02-19 21:56:21', '0000-00-00'),
(62, 'Амантай Жаркынбек', '\"Поэт, языковед, член Союза писателей Казахстана, депутат Мажилиса Парламента РК, член Общественного объединения «JEBE». Родился 20 ноября 1988 года. Окончил 11-летнюю школу в Актогайском районе Павлодарской области, в 2006 году поступил на филогический факультет Павлодарского государственного педагогического института, в 2010 году окончил данный вуз.\r\n \r\n Победитель, призер областных, республиканских Абаевских, Мукагалиевских чтений. Победитель областных конкурсов поэтов: «Туған тілім – тұғымым», «Махаббат жыры», «Мұқағали әлемімен сырласу». В 2006 году вышел первый сборник стихов под названием «Аллажар», а в 2018 году - второй сборник стихов «Ескі сурет».\r\n \r\n В 2008 году занял 1 место в республиканском конкурсе «Кайрат рухы» в г. Семей. 2 место в республиканском конкурсе, посвященном 110-летию Исы Байзакова, проведенном в 2009 году в г. Павлодаре.\r\n \r\n Обладатель 1-го места в конкурсе эпосов, посвященном 20-летию образования Всемирной ассоциации казахов. В 2018 году занял 2-е место в республиканском конкурсе акынов, посвященном С. Торайгырову.\r\n \r\n 2011-2013 гг. – корреспондент Павлодарской областной газеты «Сарыарқа самалы».\r\n \r\n 2013-2018 гг. – ответственный секретарь областной газеты «Регион.KZ».\r\n \r\n 2018-2019 гг. – шеф-редактор областного радио «HALYQ RADIOSY».\r\n \r\n 2019 г. – заместитель руководителя Павлодарского областного казахского музыкально-драматического театра имени Ж. Аймаутова.\r\n \r\n 2020-2023 гг. – директор Павлодарского областного филиала Союза писателей Казахстана.\r\n \r\n 2021 г. – исполняющий обязанности руководителя Павлодарского областного центра народного творчества и культурно-досуговой деятельности «Шаңырақ».\r\n \r\n В 2019 году был принят в члены Союза писателей Казахстана на республиканском форуме писателей в г. Караганде, посвященном 125-летию С. Сейфуллина.\r\n \r\n Произведения издаются в областных газетах «SARYARQA SAMALY», республиканских газетах «Қазақ әдебиеті», «Көш», литературно-художественном, общественно-политическом журнале «Naizatas», жарналах «Тұмар», «Жұлдыз». В различные сборники вошли произведения «Қазақ поэзиясының антологиясына», «Ертіс толқыны», «Жанартау», «Ертіс әуендері», «Бәйшешек», «Теңізге тамған тамшылар» и др.\"', '1708358363.JPG', 1988, 1, '2024-02-19 21:59:23', '0000-00-00'),
(63, 'Асылгазы Мейрам', 'Журналист, писатель, переводчик, член Союза писателей Казахстана. Асылгазы Мейрам родился 7 ноября 1948 года, в совхозе «Аккольский», ныне сельская зона г. Экибастуза, Павлодарской области. Окончил Казахский Государственный университет. Свою трудовую деятельность, как журналист, он начал в редакции Павлодарской областной газете «Қызыл ту». Затем был старшим редактором, заведующим редакцией издательства «Жалын», главным редактором издательства «Жібек жолы». Автор книги рассказов «Ауылдастар» и повестей «Өзгеше бір күн». Перевел на казахский язык книгу вождя национальной освободительной борьбы Индии Махатма Ганди «Моя жизнь» и книгу Ульяма Дрепера «История развития европейского мышления».', '1708358426.jpg', 19481999, 1, '2024-02-19 22:00:26', '0000-00-00'),
(64, 'Ауталипов Райымкул', '\"Писатель-прозаик. Ауталипов Райымкул родился 1923 году в Павлодарской области, Иртышского района, а. Токты. Окончил Высшие литературные курсы СП СССР (1959-1961), Казахский Государственный университет. Работал в редакции газеты Акмолинской, Карагандинской области, редактором в Казахском государственном издательстве, директором школы, корреспондентом Алматинского радио, заведующим секцией Карагандинского меж областного отделения СП Казахстана.\r\n \r\n Впервые начал печататься в 50-е годы. Первый сборник стихов под названием «Друг отца» вышел в свет в 1956 году. Затем появились в печати: повести «Долина золотых плодов», «После свадьбы», «Степное солнце».\r\n \r\n Награжден медалью «За доблестный труд в годы Великой Отечественной войны».\"', '1708358508.jpg', 19231999, 1, '2024-02-19 22:01:48', '0000-00-00'),
(65, 'Байбосын Сайлау Әшенұлы', '\"Родился в 1958 году 16 марта в селе Ажы Акмолинской области. Окончил Целиноградский кооперативный техникум. Писатель, публицист, поэт, заслуженный работник культуры Республики Казахстан (1998), член Союза писателей Казахстана, почетный гражданин Ерейментауского и Баянаульского районов. Лауреат республиканского конкурса народных песен «Жастар дауысы» (1987). Призер поэтических мушайра республиканского и областного уровней. Редактор Павлодарского областного журнала  «АКБЕТТАУ». С 1987 года работал в Ерейментауском районном отделе культуры, с 1997 года-руководителем школы молодых поэтов в Доме культуры имени Умбетей жырау г. Ерейментау, а также литературным сотрудником, редактором районных газет «Ереймен», «Ерейментау», с 2006 года – редактором региональных газет «Ереймен елі», «Инфо-Рейтинг» в Ерейментау. Был собственным корреспондентом газеты «Арқа ажары» Акмолинской области.\r\n\r\nПервые стихи были напечатаны в 1986 году. Сборник стихов «Дат» (2001), сборник сатирических рассказов «... деген екен Ерейменде» (2002), сборник стихов  «Рух» (2008), историко-познавательная книга «Ерейментау» (2009). Выпустил книгу «Мысли, афоризмы и шутки знаменитых мужчин» (Москва, издательство «Эксмо», 2005), сборник стихов «Қызылтау» (2015), «Қызылтау–құтты қоныс, киелі аймақ» (2011), «Қанжығалылар» (2015), «Есімдері жүрсін деп ел есінде...» (2016), «Қорғалжын» (2018); сборник сатирических рассказов:  «Депутаттың бәтіңкесі» (2016); роман: «Ажалын жоғалтқан адам» (2013); драма: «Мылтықсыз майдан» (2014);\r\n\r\nВ 2008 году обладатель гран-при в республиканской мушайре акынов «Бір өлең–бір әлем». В 2009 году обладатель главного приза региональной мушайры, посвященный 300-летию Умбетей жырау, в 2015 году в литературном конкурсе «Алаш тарихының ақиқаты», посвященный 550-летию Казахского ханства, его дастан «Баба-Байрақ» получил первое место.\r\n\r\nВ 2016 году была награжден призом традиционного литературного конкурса «Алтын қалам» по жанру сатиры. В 2017 году на международной мушайре под названием «Алаш арманы –Тәуелсіз Қазақ елі», организованной партией «Ак жол», его поэма «Жүсіпбек пен Сұлтанмахмұт» получила второе место.\"', '1708358540.jpg', 1958, 1, '2024-02-19 22:02:20', '0000-00-00'),
(66, 'Байгалова Шолпан Байгаловна', '\"Поэт, журналист, член Союза журналистов и писателей Казахстана, Почетный гражданин города Павлодара. Родилась 20 августа 1948 года в селе Жанатап Актогайского района Павлодарской области. С малых лет жила и воспитывалась в селе Кызылтан Теренкольского (ранее Качирского) района, где окончила школу.\r\n\r\nПервые стихи были опубликованы в республиканском журнале «Қазақстан әйелері», а затем в областных газетах «Қызыл ту», «Қазақстан пионері», «Лениншіл жас», «Социалистік Қазақстан»,  когда она училась в 7 классе в селе Кызылтан.На стихи «Ауылым», «Туған жер» вышел сборник песен местного композитора Мейрама Ермекбаева.\r\n\r\nВ 1967 году работала корректором областной газеты «Қызыл ту». В 1968 году поступила в Казахский государственный университет имени С. М. Кирова на факультет журналистики, в 1974 году закончила заочно. В 1972 году издательством «Жалын» был выпущен сборник стихов молодых поэтов «Көктем тынысы», куда вошли ее произведения. Работала редактором молодежных передач в областном комитете радио и телевизионного вещания. В газете «Кызыл ту» (ныне «Сарыарка самалы») работала журналистом, заведующей отделом журналистического творчества. Преподавала журналистам в ИнЕУ. Работала редактором областной газеты «Ақ жаулық», затем выпускала газеты «Айбар», «Ертіс-Бизнес», «Айбат». В 70-80-е годы участвовала в областных и республиканских айтысах.\r\n\r\nВ разные годы были изданы произведения: «Көктем тынысы» (1972 г.), цикл стихов «Ай-нұрым менің» (2000 г.), «Еркелеймін Ертіске» (2003 г.), «Сезімді қайтем тулаған» (2006 г.), «Қазақ журналистикасының тарихынан лекция курсы» (2008 г.), «Сыр сандық» (2009 г.), а также книга эссе «Сағым уақыт» (2013 г.), памятные рассказы «Толқиды Ертіс» (2015 г.), «Қызылтан алтын бесігім» (2016 г.), «Таңшолпан» (2018 г.), «Менің мәтті тағдырым» (2019 г.), «Ай-тұмар» (2021 г.). Шолпан Байгалы перевела с русского на казахский язык стихи павлодарских поэтов Ю. Примака, О. Григорьевой и Н. Ваккер.\"', '1708358569.jpg', 1948, 1, '2024-02-19 22:02:49', '0000-00-00'),
(67, 'Cora Henderson', 'Velit ipsum anim atq', '1709051736.png', 20122087, 1, '2024-02-27 22:35:36', '2024-02-27');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `libraries`
--
ALTER TABLE `libraries`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `writers`
--
ALTER TABLE `writers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `libraries`
--
ALTER TABLE `libraries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `writers`
--
ALTER TABLE `writers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;