<?php
	class RetriveData extends DbConn {
		
		public function retriveID () {
		
			$result = "";
			try {

            $db = new DbConn;
            $tbl_invoices = $db->tbl_invoices;
            $err = '';
			$stmt = $db->conn->prepare("SELECT MAX(id) as maxGroup FROM ".$tbl_invoices);
			$stmt->execute();
			$err = '';
			// Gets query result
			$result = $stmt->fetch(PDO::FETCH_ASSOC);

			} catch (PDOException $e) {

				$err = "Error: " . $e->getMessage();

			}
			
			if ($err == '') {
				
			$y = date("Y").date("m").date('d');
			//echo ('SCM').($y).($result["maxGroup"]+1);
			$success = ('SCM').($y).($result["maxGroup"]+1);

        } else {

            $success = $err;

        };

        return $success;
		}
	}
?>