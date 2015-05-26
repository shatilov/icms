<?php
/**
 * Created by PhpStorm.
 * User: Игорь
 * Date: 26.05.2015
 * Time: 2:25
 */

class Helper_Lentas
{

    public static function getlenta($id_book)
    {
        $image = new Data_image();
        $uss=new Data_Users();
        $comments = new Data_Comment();
        $c1 = $comments->get($id_book)->fetchAll();


        $user = Data_CurrentUser::get();
        if ($user) {
            echo '<div class="comment" >
					<div class="avamin">
					    <img src="' . $image->get_avatar($user->getAvatar()) . '">

							' . $user->getName() . '
					</div>


					<div class="txt" >
					 <form name="test" method="post" action=" ">
					 <textarea name ="comm" class="form-control" rows="3"></textarea>
 					</div>

		 <button type="submit" class="btn btn-primary">Отправить</button>
			<button type="reset" class="btn btn-inverse">очистить</button>
				' . date("d-m-Y") . ' </form>
				</div>';
        }
        if($c1) {
            foreach ($c1 as $c) {
                $links[] =
                    '<div class="comment" >
                            <div class="avamin">
                                 <img src="' . $image->get_avatar($uss->get_ava($c["user_id"])) . '">
                                    ' .$uss->get_name( $c["user_id"])  . '
                                    </div>
                            <div class="txt" > ' . $c["text"] .'</div>
                                ' . $c["date"] . '
                            </div>';

            }
            foreach ($links as $l) {
                echo $l;
            }
        }
    }

}