<?php
    class InsertCost extends DbConn {
        public function putCompany ($companyName, $latitude, $longitude, $address, $yearOfExistance) {
            try {
                $db = new DbConn;
                $tbl_company = $db->tbl_company;
                
                $stmt = $db->conn->prepare("INSERT INTO ".$tbl_company."(companyName, latitude, longitude, address, yearOfExistance)
                                            VALUES (:companyName, :latitude, :longitude, :address, :yearOfExistance)");
                $stmt->bindParam(':companyName', $companyName);
                $stmt->bindParam(':latitude', $latitude);
                $stmt->bindParam(':longitude', $longitude);
                $stmt->bindParam(':address', $address);
                $stmt->bindParam(':yearOfExistance', $yearOfExistance);
                $stmt->execute();
				$err = '';
			} catch (PDOException $e) {
                $err = "Error: " . $e->getMessage();
            }
             if ($err == '') {
                $success = 'true';
            } else {
                $success = $err;
            };

            return $success;

        }
        
        public function putProfession ($profCode, $description) {
            try {
                $db = new DbConn;
                $tbl_prof = $db->tbl_prof;
                
                $stmt = $db->conn->prepare ("INSERT INTO ".$tbl_prof."(profCode, description) VALUES(:profCode, :description)" );
                
                $stmt->bindParam (':profCode', $profCode);
                $stmt->bindParam (':description', $description);
                
                $stmt->execute ();
                
                $err = '';
            } catch (PDOException $e) {
                 $err = "Error: " . $e->getMessage();
            }
            
            if ($err == '') {
                $success = 'true';
            } else {
                $success = $err;
            };

            return $success;
        }
        
        
        public function putStasticalData ($profCode, $compCode, $startDate, $endDate, $expLevel, $locationCode, $pricePerhour) {
            try {
                
                $db = new DbConn;
                $tbl_stastical = $db->tbl_stastical;
                
                $stmt = $db->conn->prepare ("INSERT INTO ".$tbl_stastical."(profCode, compCode, startDate, endDate, expLevel, locationCode, pricePerhour) VALUES(:profCode, :compCode, :startDate, :endDate, :expLevel, :locationCode, :pricePerhour)" );
                                
                $stmt->bindParam (':profCode', $profCode);
                $stmt->bindParam (':compCode', $compCode);
                $stmt->bindParam (':startDate', strtotime($startDate));                
                $stmt->bindParam (':endDate', strtotime($endDate));
                $stmt->bindParam (':expLevel', $expLevel);
                $stmt->bindParam (':locationCode', $locationCode);
                $stmt->bindParam (':pricePerhour', $pricePerhour);
                
                $stmt->execute ();
                
                $err = '';
            } catch (PDOException $e) {
                 $err = "Error: " . $e->getMessage();
            }
            
            if ($err == '') {
                $success = 'true';
            } else {
                $success = $err;
            };

            return $success;
            
        }
        
        public function putExperience ($expLevel) {
            try {
                
                $db = new DbConn;
                $tbl_experience = $db->tbl_experience;
                
                $stmt = $db->conn->prepare ("INSERT INTO ".$tbl_experience."(expLevel) VALUES(:expLevel)" );
                                
                $stmt->bindParam (':expLevel', $expLevel);
                
                $stmt->execute ();
                
                $err = '';
            } catch (PDOException $e) {
                 $err = "Error: " . $e->getMessage();
            }
            
            if ($err == '') {
                $success = 'true';
            } else {
                $success = $err;
            };

            return $success;
        }
        
        
        public function getprofCode () {
			$result = "";
			try {
				$db = new DbConn;
				$tbl_profCode = $db->tbl_prof;
				$stmt = $db->conn->prepare("SELECT * FROM ".$tbl_profCode);
				$stmt->execute();
				$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                $err='';
				
			} catch (PDOException $e) {
				$err = "Error: " . $e->getMessage();
			}
			if ($err == '') {
				$success = $result;
			} else {
				$success = $err;
			}
			
			return $success;
		}
        
        
        
        public function getCompCode() {
			$result = "";
			try {
				$db = new DbConn;
				$tbl_profCode = $db->tbl_company;
				$stmt = $db->conn->prepare("SELECT * FROM ".$tbl_profCode);
				$stmt->execute();
				$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                $err='';
				
			} catch (PDOException $e) {
				$err = "Error: " . $e->getMessage();
			}
			if ($err == '') {
				$success = $result;
			} else {
				$success = $err;
			}
			
			return $success;
		}
        
        
        public function getExpLevel() {
            $result = "";
            
			try {
				$db = new DbConn;
				$tbl_profCode = $db->tbl_experience;
				$stmt = $db->conn->prepare("SELECT * FROM ".$tbl_profCode);
				$stmt->execute();
				$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                $err='';
				
			} catch (PDOException $e) {
				$err = "Error: " . $e->getMessage();
			}
			if ($err == '') {
				$success = $result;
			} else {
				$success = $err;
			}
			
			return $success;
        }
        
    }
?>