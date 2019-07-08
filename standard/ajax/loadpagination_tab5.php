<?php
$CurrentPage = $_POST['pageid'];
$totalBidWin = $_POST['totalBidWin'];
function paginate_three($reload, $page, $tpages, $adjacents) {
if($page<=0)  $page  = 1;
if($adjacents<=0) $adjacents = 4;
	
	$prevlabel = "&lsaquo; Previous";
	$nextlabel = "Next &rsaquo;";	
	$out = "<ul class='paging'>";	
	// previous
	if($page==1) {
		$out.= "<li class='paginationli the_basic_buttons  paginglis paginglis_previous'><a><span>" . $prevlabel . "</span></a>\n</li>";
	}
	elseif($page==2) {
		$out.= "<li class='paginationli the_basic_buttons  paginglis paginglis_previous'><a onclick=\"load_basic_practice_bidwin(1)\">" . $prevlabel . "</a>\n</li>";
	}
	else {
		$out.= "<li class='paginationli the_basic_buttons  paginglis paginglis_previous'><a onclick=\"load_basic_practice_bidwin(".($page-1).")\">" . $prevlabel . "</a>\n</li>";
	}	
	// first
	if($page>($adjacents+1)) {
		$out.= "<li class='paginationli'><a onclick=\"load_basic_practice_bidwin(1)\">1</a>\n</li>";
	}	
	// interval
	if($page>($adjacents+2)) {
		$out.= "<li class='paginationli'><a>...\n</a></li>";
	}	
	// pages
	$pmin = ($page>$adjacents) ? ($page-$adjacents) : 1;
	$pmax = ($page<($tpages-$adjacents)) ? ($page+$adjacents) : $tpages;
	for($i=$pmin; $i<=$pmax; $i++) {
		if($i==$page) {
			$out.= "<li class='paginationli'><a class='active'><span class=\"current\">" . $i . "</span>\n</a></li>";
		}
		elseif($i==1) {
			$out.= "<li class='paginationli'><a onclick=\"load_basic_practice_bidwin(".$i.")\">" . $i . "</a>\n</li>";
		}
		else {
			$out.= "<li class='paginationli'><a onclick=\"load_basic_practice_bidwin(".$i.")\">" . $i . "</a>\n</li>";
		}
	}	
	// interval
	if($page<($tpages-$adjacents-1)) {
		$out.= "<li class='paginationli'><a>...\n</a></li>";
	}	
	// last
	if($page<($tpages-$adjacents)) {
		$out.= "<li class='paginationli'><a onclick=\"load_basic_practice_bidwin(".$tpages.")\">" . $tpages . "</a></li>";
	}	
	// next
	if($page<$tpages) {
		$out.= "<li class='paginationli the_basic_buttons the_basic_buttons_next paginglis paginglis_next'><a onclick=\"load_basic_practice_bidwin(".($page+1).")\">" . $nextlabel . "</a>\n</li>";
	}
	else {
		$out.= "<li class='paginationli the_basic_buttons the_basic_buttons_next paginglis paginglis_next'><a><span>" . $nextlabel . "</span>\n</a></li>";
	}	
	$out.= "</ul>";	
	return $out;
}
echo paginate_three('', $CurrentPage, $totalBidWin, 1);
?>