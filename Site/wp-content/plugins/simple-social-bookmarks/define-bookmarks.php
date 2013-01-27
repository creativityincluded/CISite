<?php
/*
Function to define array containing bookmarking service details

Each array elements contains 6 pieces of information...

1. The name of the service - in mixed case, this is also use as the icons ALT text and to display
   (optionally) next to the icon.
   If preceeded with a hash then this is one of the default services.
2. The service code, as used in the parameter to specify the services to use.
   Always in lower case, this also doubles as the icon name.
   If preceeded with a hash then a shortened URL should be passed, if available.
3. AddThis service name.
4. Shareaholic service name.
5. AddToAny service name.
6. URL to use if not on above services.

Bookmarks are listed first, followed by tools. These are seperated by a blank record.
*/
function setup_social_sites() {
    
$social_sites=array(
array('100zakladok','100zakladok','100zakladok','','',''),
array('A1-Webmarks','a1webmarks','a1webmarks','','',''),
array('AddThis','addthis','menu','','',''),
array('AddToAny','addtoany','','','','http://www.addtoany.com/share_save?linkurl=[url]&amp;linkname=[title]'),
array('Allvoices','allvoices','','63','allvoices',''),
array('Amazon (CA) Wish List','amazon_ca','','271','',''),
array('Amazon (DE) Wish List','amazon_de','','272','',''),
array('Amazon (FR) Wish List','amazon_fr','','273','',''),
array('Amazon (JP) Wish List','amazon_jp','','274','',''),
array('Amazon (UK) Wish List','amazon_uk','','270','',''),
array('Amazon (US) Wish List','amazon_us','','200','amazon_wish_list',''),
array('AOL Lifestream','aollifestream','aim','50','aim',''),
array('AOL Mail','aolmail','','55','aol_mail',''),
array('Baang','baang','baang','','',''),
array('Baidu','baidu','baidu','','',''),
array('Balatarin','balatarin','','241','',''),
array('Barrapunto','barrapunto','','','','http://barrapunto.com/submit.pl?subj=[title]&amp;story=[url]'),
array('Bebo','bebo','bebo','196','bebo',''),
array('BibSonomy','bibsonomy','','25','bibsonomy',''),
array('BiggerPockets','biggerpockets','biggerpockets','','',''),
array('Bitacoras','bitacoras','','','','http://bitacoras.com/anotaciones/[url]'),
array('Blinklist','blinklist','blinklist','48','blinklist',''),
array('Blip','#blip','blip','','',''),
array('Blogger','blogger','blogger','219','blogger_post',''),
array('Bloggy','#bloggy','bloggy','','',''),
array('Bloglines','bloglines','','','','http://www.bloglines.com/sub/[url]'),
array('BlogMarks','blogmarks','','27','blogmarks',''),
array('Blogpoint','blogpoint','','','','http://blogpoint.ro/add_url.php?url=[url]'),
array('Blogter Cimlap','blogtercimlap','','','','http://cimlap.blogter.hu/index.php?action=suggest_link&amp;title=[title]&amp;url=[url]'),
array('Blurpalicious','blurpalicious','blurpalicious','','',''),
array('BobrDobr','bobrdobr','bobrdobr','266','',''),
array('BonzoBox','bonzobox','bonzobox','','',''),
array('Bookmark.it','bookmark_it','','','','http://www.bookmark.it/bookmark.php?url=[url]'),
array('BookmarkingNet','socialbookmarkingnet','socialbookmarkingnet','','',''),
array('Bookmarks.fr','bookmarks_fr','','35','bookmarks_fr',''),
array('Bookmarky.cz','bookmarky_cz','bookmarkycz','','',''),
array('Box.net','boxdotnet','box','240','box_net',''),
array('Bryderi.se','bryderi','bryderi','','',''),
array('businessweek','businessweek','','','','http://bx.businessweek.com/api/add-article-to-bx.tn?url=[url]'),
array('BuzzFeed','buzzfeed','','','',''),
array('BuzzURL','buzzurl','','','','http://buzzurl.jp/entry/[url]'),
array('Care2','care2','care2','104','care2_news',''),
array('Choix','choix','','','','http://www.choix.jp/bloglink/[url]'),
array('CiteULike','citeulike','citeulike','13','citeulike',''),
array('clp.ly','clply','clply','','',''),
array('Co.mments','comments','','','','http://co.mments.com/track?url=[url]&amp;title=[title]'),
array('Connotea','connotea','connotea','96','connotea',''),
array('coRank','corank','','','','http://www.corank.com/submit?url=[url]&title=[title]'),
array('COSMiQ','cosmiq','cosmiq','','',''),
array('Current','current','','80','current',''),
array('DailyMe','dailyme','','237','dailyme',''),
array('dealsplus','dealsplus','','','','http://dealspl.us/submit?op=deal&step=1&unurl=[url]'),
array('#Delicious','delicious','delicious','2','delicious',''),
array('#Digg','digg','digg','3','digg',''),
array('Diggita','diggita','diggita','','',''),
array('Diggitsport','diggitsport','','','','http://www.diggitsport.com/posta_ok?action=f2&amp;title=[title]&amp;url=[url]'),
array('diHITT','dihitt','','244','',''),
array('Diigo','diigo','','24','diigo',''),
array('Dipdive','dipdive','dipdive','','',''),
array('DotNetKicks','dotnetkicks','dotnetkicks','','',''),
array('Douban','douban','douban','','',''),
array('DZone','dzone','','102','dzone',''),
array('Edelight','edelight','edelight','','',''),
array('eKudos','ekudos','','','','http://www.ekudos.nl/artikel/nieuw?url=[url]&amp;title=[title]'),
array('elefanta.pl','elefantapl','elefantapl','','',''),
array('Evernote','evernote','evernote','191','evernote',''),
array('#Facebook','facebook','facebook','5','facebook',''),
array('Fai Informazione','informazione','informazione','','',''),
array('Fark','fark','fark','62','fark',''),
array('Faves','faves','faves','49','faves',''),
array('Favoriten.de','favoriten_de','favoritende','242','',''),
array('FC2 Bookmark','fc2bookmark','','','','http://bookmark.fc2.com/user/post?url=[url]&[title]'),
array('Flaker','flaker','flaker','','',''),
array('Fnews','fnews','','','',''),
array('Folkd','folkd','folkd','197','folkd',''),
array('forceindya','forceindya','forceindya','','',''),
array('FreeDictionary','thefreedictionary','thefreedictionary','','',''),
array('Fresqui','fresqui','fresqui','','',''),
array('FriendFeed','friendfeed','friendfeed','43','friendfeed',''),
array('Friendster','friendster','friendster','','',''),
array('funP','funp','funp','17','funp',''),
array('Gamekicker','gamekicker','gamekicker','','',''),
array('Ghidoo','ghidoo','','','','http://www.ghidoo.ro/nodes/new?node%5Burl%5D=[url]&amp;node%5Btitle%5D=[title]'),
array('Global Grind','globalgrind','','89','',''),
array('Google Bookmarks','googlebookmarks','google','74','google_bookmarks',''),
array('Google Buzz','googlebuzz','googlebuzz','257','google_buzz',''),
array('Google Notebook','googlenotebook','','','',''),
array('Google Reader','reader','googlereader','207','google_reader',''),
array('Google+','googleplus','google_plusone','','google_plus',''),
array('Grono.net','grono','grono','','',''),
array('Grumper','grumper','grumper','','',''),
array('Gwar','gwar','','','','http://www.gwar.pl/DodajGwar.html?u=[url]'),
array('Haber.gen.tr','habergentr','habergentr','','',''),
array('Hacker News','hackernews','','202','',''),
array('Hadash Hot','hadashhot','hadashhot','','',''),
array('Hao Hao Report','haohao','','','','http://www.haohaoreport.com/submit.php?url=[url]&amp;title=[title]'),
array('Hatena Bookmarks','hatena','hatena','246','',''),
array('Hazarkor','hazarkor','hazarkor','','',''),
array('Healthimize','healthimize','gluvsnap','','',''),
array('Hedgehogs.net','hedgehogs','hedgehogs','','',''),
array('HelloTxt','hellotxt','hellotxt','81','hellotxt',''),
array('Hotklix','hotklix','hotklix','','',''),
array('Hyves','hyves','hyves','105','hyves',''),
array('icio','icio','','','','http://www.icio.de/add.php?url=[url]&title=[title]'),
array('Identica','#identica','','205','identi_ca',''),
array('iGoogle','igoogle','igoogle','','',''),
array('Jamespot','jamespot','jamespot','64','jamespot',''),
array('JumpTags','jumptags','jumptags','14','jumptags',''),
array('Kaboodle','kaboodle','kaboodle','','',''),
array('Kledy','kledy','kledy','30','kledy',''),
array('Laaikit','laaikit','laaikit','','',''),
array('Ladenzeile','ladenzeile','ladenzeile','','',''),
array('LaTafanera','latafaneracat','latafaneracat','','','http://latafanera.cat/submit.php?url=[url]'),
array('Link-a-Gogo','linkagogo','linkagogo','67','linkagogo',''),
array('Link Ninja','linkninja','linkninja','','',''),
array('Linkarena','linkarena','','','','http://linkarena.com/bookmarks/addlink/?url=[url]&title=[title]'),
array('#LinkedIn','linkedin','linkedin','88','linkedin',''),
array('Linkter','linkter','','','','http://www.linkter.hu/index.php?action=suggest_link&amp;url=[url]&amp;title=[title]'),
array('Linkuj.cz','linkuj','linkuj','','',''),
array('Live Messenger','messenger','live','','messenger',''),
array('Livedoor Clip','livedoor','','','','http://clip.livedoor.com/redirect?link=[url]&title=[title]&ie=utf-8'),
array('LiveJournal','livejournal','livejournal','79','livejournal',''),
array('Mawindo','mawindo','mawindo','','',''),
array('meinVZ','meinvz','meinvz','','',''),
array('Mekusharim','mekusharim','mekusharim','','',''),
array('Memori.ru','memori','memori','269','',''),
array('Men�ame','meneame','meneame','33','memeame',''),
array('Mister Wong','misterwong','misterwong','6','mister_wong',''),
array('Mister Wong DE','misterwong_de','misterwong_de','','',''),
array('Mixx','mixx','mixx','4','mixx',''),
array('Moemesto','moemesto','moemesto','268','',''),
array('mototagz','mototagz','mototagz','','',''),
array('MSDN','msdn','','184','msdn',''),
array('MSNReporter','msnreporter','','','','http://reporter.nl.msn.com/?fn=contribute&amp;Title=[title]&amp;URL=[url]&amp;cat_id=6&amp;tag_id=31'),
array('Multiply','multiply','multiply','42','multiply',''),
array('Muti','muti','','','','http://www.muti.co.za/submit?url=[url]&amp;title=[title]'),
array('myAOL','myaol','myaol','','',''),
array('MyLinkVault','mylinkvault','','98','mylinkvault',''),
array('MyShare','myshare','','','','http://myshare.url.com.tw/index.php?func=newurl&amp;url=[url]&amp;desc=[title]'),
array('MySpace','myspace','myspace','39','myspace',''),
array('N4G','n4g','n4g','','',''),
array('NetLog','netlog','netlog','8','netlog',''),
array('Netvibes','netvibes','netvibes','195','netvibes_share',''),
array('Netvouz','netvouz','netvouz','21','netvouz',''),
array('newsing','newsing','','','','http://newsing.jp/nbutton?title=[title]&url=[url]'),
array('NewsTrust','newstrust','newstrust','199','newstrust',''),
array('Newsvine','newsvine','newsvine','41','newsvine',''),
array('Nifty Clip','niftyclip','','','','http://clip.nifty.com/create?url=[url]&title=[title]'),
array('Ning','ning','','264','',''),
array('NowPublic','nowpublic','','75','nowpublic',''),
array('NUjij','nujij','','238','',''),
array('OKNOtizie','oknotizie','oknotizie','243','',''),
array('Orkut','orkut','','247','orkut',''),
array('PFBuzz','pfbuzz','','','','http://pfbuzz.com/submit?url=[url]&amp;title=[title]'),
array('Ping.fm','pingfm','pingfm','45','ping',''),
array('Plaxo','plaxo','plaxo','44','plaxo_pulse',''),
array('Plurk','plurk','plurk','218','plurk',''),
array('Pochval.cz','pochvalcz','pochvalcz','','',''),
array('Posterous','posterous','posterous','210','posterous',''),
array('Prati.ba','pratiba','pratiba','','',''),
array('Preferate','preferate','','','','http://preferate.net/add.php?u=[url]&amp;t=[title]'),
array('Pusha','pusha','pusha','59','pusha',''),
array('Quantcast','quantcast','quantcast','','',''),
array('Read It Later','readitlater','readitlater','239','read_it_later',''),
array('ReadWriteWeb','readwriteweb','','250','',''),
array('#reddit','reddit','reddit','40','reddit',''),
array('Rediff MyPage','rediff','rediff','','',''),
array('RedKum','redkum','redkum','','',''),
array('Scoop.at','scoopat','scoopat','','',''),
array('Scoopeo','scoopeo','','','','http://www.scoopeo.com/scoop/new?newurl=[url]&amp;title=[title]'),
array('Sekoman','sekoman','sekoman','','',''),
array('Shaveh','shaveh','shaveh','','',''),
array('SheToldMe','shetoldme','shetoldme','','',''),
array('Sina Weibo','sinaweibo','sinaweibo','','',''),
array('SlashDot','slashdot','slashdot','61','slashdot',''),
array('SMI','smiru','smiru','','',''),
array('Social.com','socialdotcom','','','',''),
array('Socialdust','socialdust','','','','http://www.socialdust.com/blogaggregator/addblog.php?urlpost=[url]&amp;title=[title]'),
array('SodaHead','sodahead','sodahead','','',''),
array('Sonico','sonico','sonico','','',''),
array('Soup.io','soupio','','217','',''),
array('Sportpost','sportpost','sportpost','','',''),
array('SpringPad','springpad','springpad','265','',''),
array('Spurl','spurl','','82','spurl',''),
array('Squidoo','squidoo','squidoo','46','squidoo',''),
array('Startlap','startlap','startlap','','',''),
array('Strands','strands','','190','strands',''),
array('studiVZ','studivz','studivz','','',''),
array('#StumbleUpon','stumbleupon','stumbleupon','38','stumbleupon',''),
array('Stylehive','stylehive','stylehive','','',''),
array('Su.pr','supr','','232','',''),
array('Svejo','svejo','svejo','245','',''),
array('SWiK','swik','','','','http://stories.swik.net/?bookmarklet=v1&submitUrl&url=[url]&title=[title]'),
array('TagMarks.de','tagmarksde','tagmarksde','','',''),
array('Tagvn','tagvn','tagvn','','',''),
array('Tagza','tagza','tagza','187','tagza',''),
array('Techmeme','techmeme','','204','',''),
array('TechNet','technet','','185','technet',''),
array('Technorati','technorati','','10','technorati_favorites',''),
array('ThisNext','thisnext','thisnext','','',''),
array('Tuenti','tuenti','','','tuenti',''),
array('Tulinq','tulinq','tulinq','','',''),
array('Tumblr','tumblr','tumblr','78','tumblr',''),
array('TweetMeme','tweetmeme','tweetmeme','','',''),
array('#Twitter','#twitter','twitter','7','twitter',''),
array('TypePad','typepad','typepad','','typepad_post',''),
array('Upnews','upnews','','','','http://www.upnews.it/submit?url=[url]&amp;title=[title]'),
array('Urlaubswerk','urlaubswerkde','urlaubswerkde','','',''),
array('Viadeo','viadeo','viadeo','92','viadeo',''),
array('Virb','virb','virb','','',''),
array('Visitez Mon Site','visitezmonsite','visitezmonsite','','',''),
array('vk.com','vk','vk','','',''),
array('VodPod','vodpod','','198','vodpod',''),
array('vybrali SME','vybralisme','vybralisme','','',''),
array('Webnews','webnews','webnews','57','webnews',''),
array('Webnews.de','webnews_de','','','','http://www.webnews.de/einstellen?url=[url]&amp;title=[title]'),
array('Wikio','wikio','wikio','','','http://www.wikio.com/sharethis?url=[url]&amp;title=[title]'),
array('Wikio FR','wikio_fr','','','','http://www.wikio.fr/vote?url=[url]'),
array('Wikio IT','wikio_it','','','','http://www.wikio.it/vote?url=[url]'),
array('Windows Live Spaces','winlivespaces','','15','',''),
array('Windy Citizen','windycitizen','windycitizen','','',''),
array('Wink','wink','','22','wink',''),
array('Wists','wists','','94','wists',''),
array('Wordpress','wordpress','wordpress','230','wordpress',''),
array('Wovre','wovre','wovre','','',''),
array('Wykop','wykop','wykop','','',''),
array('Xanga','xanga','xanga','','',''),
array('XING','xing','','','xing',''),
array('Yahoo! Bookmarks','yahoobookmarks','yahoobkm','76','yahoo_bookmarks',''),
array('Yahoo! Bookmarks Japan','yahoobookmarks_jp','','','','http://bookmarks.yahoo.co.jp/bookmarklet/showpopup?t=[title]&u=[url]&ei=UTF-8'),
array('Yahoo! Buzz','yahoobuzz','buzz','73','yahoo_buzz',''),
array('Yahoo! Buzz France','yahoobuzz_fr','buzz_fr','','',''),
array('Yahoo! Messenger','yahoomessenger','','87','yahoo_messenger',''),
array('Yandex','yandex','','267','',''),
array('Yardbarker','yardbarker','yardbarker','','',''),
array('Yigg','yigg','yigg','56','yigg',''),
array('Zakladok.net','zakladoknet','zakladoknet','','',''),
array('Zilei','zilei','','','','http://zilei.ro/submit/?url=[url]'),
array('','','',''),
array('2 Tag','2tag','2tag','','',''),
array('Aviary Capture','aviarycapture','aviary','','',''),
array('Bit.ly','bitly','bitly','208','',''),
array('#Email','email','','','','mailto:?subject=[email_title]&amp;body=[email_text]'),
array('Gmail','gmail','gmail','52','google_gmail',''),
array('Google Translate','googletranslate','translate','252','',''),
array('HootSuite','hootsuite','','261','',''),
array('Hotmail','hotmail','hotmail','53','hotmail',''),
array('HTML Validator','w3validator','w3validator','','',''),
array('Instapaper','instapaper','','18','instapaper',''),
array('is.gd','isgd','','228','',''),
array('j.mp','jmp','','249','',''),
array('JoliPrint','joliprint','joliprint','','',''),
array('OS X Dashboard','osxdashboard','dashboard','','',''),
array('Page2RSS','page2rss','','','','http://page2rss.com?url=[url]'),
array('PDF Online','pdfonline','pdfonline','','',''),
array('PDFmyURL','pdfmyurl','pdfmyurl','','',''),
array('#Print Friendly','printfriendly','printfriendly','236','printfriendly',''),
array('QRF.in','qrf_in','qrfin','','',''),
array('TinyURL','tinyurl','','223','',''),
array('Whois Lookup','domaintoolswhois','domaintoolswhois','','',''),
array('Windows Gadgets','windowsgadgets','windows','','',''),
array('Yahoo! Mail','yahoomail','yahoomail','54','yahoo_mail','')
);
return $social_sites;
}
?>