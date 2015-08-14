<?php

class crud
{
	private $db;
	
	function __construct($DB_con)
	{
		$this->db = $DB_con;
	}
	
	public function create($user_id,$username,$timeframe,$goal,$actions)
	{
		try
		{
			$stmt = $this->db->prepare("INSERT INTO `xff_goals`(user_id,username,timeframe,goal,actions)VALUES(:user_id, :username, :timeframe, :goal, :actions)");
			$stmt->bindparam(":user_id",$user_id);
                        $stmt->bindparam(":username",$username);
			$stmt->bindparam(":timeframe",$timeframe);
			$stmt->bindparam(":goal",$goal);
			$stmt->bindparam(":actions",$actions);
                        $stmt->execute();
			return true;
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();	
			return false;
		}
		
	}
	
	public function getID($id)
	{
		$stmt = $this->db->prepare("SELECT * FROM xff_goals WHERE uid=:id");
		$stmt->execute(array(":id"=>$id));
		$editRow=$stmt->fetch(PDO::FETCH_ASSOC);
		return $editRow;
	}
	
	public function update($uid,$timeframe,$goal,$actions)
	{
		try
		{
			$stmt=$this->db->prepare("UPDATE xff_goals SET timeframe=:timeframe, 
                            goal=:goal, actions=:actions WHERE uid=:id ");
                        $stmt->bindparam(":id",$uid);
			$stmt->bindparam(":timeframe",$timeframe);
			$stmt->bindparam(":goal",$goal);
			$stmt->bindparam(":actions",$actions);
			$stmt->execute();
			
			return true;	
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();	
			return false;
		}
	}
	
	public function delete($uid)
	{
		$stmt = $this->db->prepare("DELETE FROM `xff_goals` WHERE uid=:id");
		$stmt->bindparam(":id",$uid);
		$stmt->execute();
		return true;
	}
	
	/* paging */
	
	public function dataview($query)
	{
            	$stmt = $this->db->prepare($query);
		$stmt->execute();
	
		if($stmt->rowCount()>0)
		{
			while($row=$stmt->fetch(PDO::FETCH_ASSOC))
			{
				?>
                <tr>
                <td><?php print($row['timeframe']); ?></td>
                <td><?php print($row['goal']); ?></td>
                <td><?php print($row['actions']); ?></td>
                <td align="center">
                    <a href="../mysql/edit_goals.php?edit_id=<?php print($row['uid']); ?>"><i class="glyphicon glyphicon-edit"></i></a>
                </td>
                <td align="center">
                <a href="../mysql/delete_goals.php?delete_id=<?php print($row['uid']); ?>"><i class="glyphicon glyphicon-remove-circle"></i></a>
                </td>
                </tr>
                <?php
			}
		}
		else
		{
			?>
            <tr>
            <td>Nothing here...</td>
            </tr>
            <?php
		}
		
	}
	
	public function paging($query,$records_per_page)
	{
		$starting_position=0;
		if(isset($_GET["page_no"]))
		{
			$starting_position=($_GET["page_no"]-1)*$records_per_page;
		}
		$query2=$query." limit $starting_position,$records_per_page";
		return $query2;
	}
	
	public function paginglink($query,$records_per_page)
	{
		
		$self = $_SERVER['PHP_SELF'];
		
		$stmt = $this->db->prepare($query);
		$stmt->execute();
		
		$total_no_of_records = $stmt->rowCount();
		
		if($total_no_of_records > 0)
		{
			?><ul class="pagination"><?php
			$total_no_of_pages=ceil($total_no_of_records/$records_per_page);
			$current_page=1;
			if(isset($_GET["page_no"]))
			{
				$current_page=$_GET["page_no"];
			}
			if($current_page!=1)
			{
				$previous =$current_page-1;
				echo "<li><a href='".$self."?page_no=1'>First</a></li>";
				echo "<li><a href='".$self."?page_no=".$previous."'>Previous</a></li>";
			}
			for($i=1;$i<=$total_no_of_pages;$i++)
			{
				if($i==$current_page)
				{
					echo "<li><a href='".$self."?page_no=".$i."' style='color:red;'>".$i."</a></li>";
				}
				else
				{
					echo "<li><a href='".$self."?page_no=".$i."'>".$i."</a></li>";
				}
			}
			if($current_page!=$total_no_of_pages)
			{
				$next=$current_page+1;
				echo "<li><a href='".$self."?page_no=".$next."'>Next</a></li>";
				echo "<li><a href='".$self."?page_no=".$total_no_of_pages."'>Last</a></li>";
			}
			?></ul><?php
		}
	}
	
	/* paging */
	
}
