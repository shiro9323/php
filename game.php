<?php

// �������� ����� ��������� �������� �������
class action{
	//���������� ��������
	public $ph1 = 100; 
	public $ph2 = 100;
	
	//������� ��� �����������, ��� ���������
	//���������� 1 - ��� ������ 1
	//���������� 2 - ��� ������ 2
	public function priority()
	{
		$nextplayer = rand(1, 2);
		echo "Next move player: ". $nextplayer . "\n";
		return $nextplayer;
	}
	
	//������� ��� ����������� ����
	public function step()
	{
		$step = rand(1, 3);
		echo "Step: ". $step . "\n";
		return $step;
	}
	
	//������� �������� ������
	
	public function act($player, $step)
	{

		if ($step == 1){
			
			$uron = rand(18, 25);
			if ($player == 1){ 
				$this->ph1-=$uron;
				echo "Player ".$player." - ".$uron."% "."Health: ".$this->ph1. "\n";
			}
			else{ 
				$this->ph2-=$uron;
				echo "Player ".$player." - ".$uron."% "."Health: ".$this->ph2. "\n";
			}
		}
		elseif ($step == 2){
			$uron = rand(10, 35);
			if ($player == 1){ 
				$this->ph1-=$uron;
				echo "Player ".$player." - ".$uron."% "."Health: ".$this->ph1. "\n";
			}
			else{ 
				$this->ph2-=$uron;
				echo "Player ".$player." - ".$uron."% "."Health: ".$this->ph2. "\n";
			}
		}
		else{
			$uron = rand(18, 25);
			if ($player == 1){ 
				if ($this->ph1 == 35) $uron+=10; 
				$this->ph1+=$uron;
				echo "Player ".$player." + ".$uron."% "."Health: ".$this->ph1. "\n";
			}
			else{ 
				if ($this->ph2 == 35) $uron+=10;
				$this->ph2+=$uron;
				echo "Player ".$player." + ".$uron."% "."Health: ".$this->ph2. "\n";
			}
		}
		
		if ($this->ph1>0 and $this->ph2>0) return $this->act($this->priority(), $this->step());
		else{
			echo "End game!". "\n";
			if ($this->ph1>0) echo "Winner - player1!";
			else echo "Winner - player2!"; 
		}
			

		//return $step;
	}
	
}

$do = new action();
$result_priority = $do->priority();//����������, ��� ���
$result_step = $do->step();//���������� ���
$do->act($result_priority, $result_step);