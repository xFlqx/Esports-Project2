<?php
        
    class ESportsDB extends SQLite3
	{
		function __construct()
		{
			$this->open('../db/sqlite/sqlite-tools-win32-x86-3180000/ESports.db');
		}
	}
	
	$esports_db = new ESportsDB();
	
	if(!$esports_db)
	{
		echo $esports_db->lastErrorMsg();
	}
	
	$news_id = intval($_GET['news_id']);
	$news_list = $esports_db->query("SELECT * FROM NEWS_ITEMS WHERE NEWS_ID=" .$news_id);	
	
	if ($news_list)
	{	
		while($row = $news_list->fetchArray(SQLITE3_ASSOC))
		{
		$news_id = $row['NEWS_ID'];
		$headline = $row['HEADLINE'];
		$author = $row['AUTHOR'];
		$date_published = $row['DATE'];	
		$content = $row['CONTENT'];	
		$image_url = $row['IMAGE_URL'];	
		
		$news = array(  'news_id' => $news_id, 'headline' => $headline, 'author' => $author, 
						'date_published' => $date_published, 'content' => $content, 'image_url' => $image_url);
		}
	}
	
	else
	{
		echo "No rows returned!";
	}
	

	header('content-type:application/json');
	
	echo json_encode($news);
	

?>  
