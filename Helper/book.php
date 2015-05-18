<?php


class Helper_book
{
	/**
	 * выдаем список книг и превращаем их в блоки
	 */
	public static function getbook()
	{
        $books = array();
        $book = new Data_book();
        $b1 = $book->get()->fetchAll();
        asort($b1);
        $img= new Data_image();
		foreach($b1 as $b)
		{
            $url =$img->get_url($b["img_id"]);
            $href = "/?go=book&id=".$b["book_id"];
            $href = '<a href="'.$href.'">';
			$links[] =
                $href
              .'<div class="book">
                <img src="'. $url .'">
                <p>'.$b["name"].'</p>
            </div>
        </a>';
		}
        $user = Data_CurrentUser::get();
        if($user)
        {
            if($user->isAdmin())
            {
            echo '
    <a href="/?go=addbook" >
        <div class="book">
            <img src="/View/image/book_add.png">
            <p> Добавить... </p>
        </div>
    </a>';}}

        foreach($links as $l)
        {
             echo $l;
        }
	}
}