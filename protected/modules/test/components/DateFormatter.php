<?php
class DateFormatter extends CComponent
{
	static function format($date)
	{
		$thisdate=new DateTime($date);
		$diff=$thisdate->diff(new DateTime('now'));
		
		if($diff->h<1)
		{
			if($diff->i==1)
				return 'минут назад';
			if($diff->i<5)
				return $diff->i.' минуты назад';
			else
				return $diff->i.' минут назад';
		}
		if($diff->d<1)
		{	
			if($diff->h==1)
				return 'час назад';
			if($diff->h<5)
				return $diff->h.' часа назад';
			else
				return $diff->h.' часов назад';
		}
		if($diff->m<1)
		{	
			if($diff->d==1)
				return 'вчера';
			if($diff->d==2)
				return 'позавчера';
			if($diff->d<5)
				return $diff->d.' дня назад';
			else
				return $diff->d.' дней назад';
		}
		if($diff->y<1)
		{	
			if($diff->m==1)
				return 'месяц назад';
			if($diff->m<5)
				return $diff->m.' месяца назад';
			else
				return $diff->m.' месяцев назад';
		}
		else
		{
			if($diff->y==1)
				return 'год назад';
			if($diff->y<5)
				return $diff->y.' года назад';
			else
				return $diff->y.' лет назад';
		}
	}
}
 