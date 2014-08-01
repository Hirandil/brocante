<?php
/**
 * Created by PhpStorm.
 * User: relbachiri
 * Date: 05/06/14
 * Time: 14:14
 */

    include_once('models/User.php');

    class userManager
    {

        private $_db;

        public function __construct(PDO $db)
        {
            $this->_db = $db;
        }

        public function create(User $u)
        {
            $q = $this->_db->prepare('INSERT INTO users (email,firstName,lastName,address,phone,password) VALUES(:em,:fn,:ln,:add,:ph,:pass) ');
            $q->bindValue(':fn', $u->getFirstName(), PDO::PARAM_STR);
            $q->bindValue(':ln', $u->getLastName(), PDO::PARAM_STR);
            $q->bindValue(':em', $u->getEmail(), PDO::PARAM_STR);
            $q->bindValue(':ph', $u->getPhone(), PDO::PARAM_STR);
            $q->bindValue(':add', $u->getAddress(), PDO::PARAM_STR);
            $q->bindValue(':pass', $u->getPassword(), PDO::PARAM_STR);
            try
            {
            $q->execute();
            }
            catch(Exception $e)
            {
                echo "Error at user creation";
            }
        }

        public function exists($mail)
        {
            $q = $this->_db->prepare('SELECT COUNT(*) FROM users WHERE email = :mail');
            $q->bindValue(':mail', $mail, PDO::PARAM_STR);
            $q->execute();
            if(!$q->fetchColumn(0))
                return false;
            else
                return true;
        }

        public function get($info)
        {
            $data = NULL ;
            if (is_string($info)) {

                $q = $this->_db->prepare('SELECT * FROM users WHERE email = :mail');
                $q->bindValue(':mail', $info, PDO::PARAM_STR);
                $q->execute();
                $data = $q->fetch(PDO::FETCH_ASSOC);
                $u = new User($data);
            }
            else {
                $id = (int) $info;

                $q = $this->_db->prepare('SELECT * FROM users WHERE id = :id');
                $q->bindValue(':id', $id, PDO::PARAM_INT);
                $q->execute();
                $data = $q->fetch(PDO::FETCH_ASSOC);
                $u = new User($data);
            }
            return $u;
        }

        public function destroy($info)
        {
            $data = NULL ;
            if (is_string($info)) {

                $q = $this->_db->prepare('DELETE FROM users WHERE email = :mail');
                $q->bindValue(':mail', $info, PDO::PARAM_STR);
                $q->execute();

            }
            else {
                $id = (int) $info;

                $q = $this->_db->prepare('DELETE FROM users WHERE id = :id');
                $q->bindValue(':id', $id, PDO::PARAM_INT);
                $q->execute();
            }
        }

        public function update($user)
        {
            $q = $this->_db->prepare('UPDATE users SET email= :mail,firstName = :fn,lastName = :ln,address = :addr,phone = :ph,password = :pass,admin = :admin WHERE id = :id');
            $q->bindValue(':mail', $user->getEmail(), PDO::PARAM_STR);
            $q->bindValue(':id', $user->getId(), PDO::PARAM_INT);
            $q->bindValue(':fn', $user->getFirstName(), PDO::PARAM_STR);
            $q->bindValue(':ln', $user->getLastName(), PDO::PARAM_STR);
            $q->bindValue(':addr', $user->getAddress(), PDO::PARAM_STR);
            $q->bindValue(':ph', $user->getPhone(), PDO::PARAM_STR);
            $q->bindValue(':pass', $user->getPassword(), PDO::PARAM_STR);
            $q->bindValue(':admin', $user->getAdmin(), PDO::PARAM_BOOL);
            $q->execute();
        }

        public function generate($token,$email)
        {
            $q = $this->_db->prepare('INSERT INTO password(email,token) VALUES (:email,:token)');
            $q->bindValue(':email', $email,PDO::PARAM_STR);
            $q->bindValue(':token', $token,PDO::PARAM_STR);
            $q->execute();
        }

        public function redefine($newPass,$token)
        {
            $q = $this->_db->prepare('UPDATE users set password = :pass WHERE email =
                                        (SELECT email FROM password WHERE token = :token)');
            $q->bindValue(':pass', $newPass,PDO::PARAM_STR);
            $q->bindValue(':token', $token,PDO::PARAM_STR);
            $q->execute();
        }

        public function cleanToken($info){
            $q = $this->_db->prepare('DELETE FROM password WHERE token = :info OR email = :info');
            $q->bindValue(':info', $info,PDO::PARAM_STR);
            $q->execute();
        }

        public function updateToPro($info)
        {
            $data = NULL ;
            if (is_string($info)) {
                $q = $this->_db->prepare('UPDATE FROM users SET professional = 1 where email = :info');
                $q->bindValue(':info', $info, PDO::PARAM_STR);
                $q->execute();

            }
            else {
                $id = (int) $info;
                $q = $this->_db->prepare('UPDATE FROM users SET professional = 1 where id = :id');
                $q->bindValue(':id', $id, PDO::PARAM_INT);
                $q->execute();
            }
        }

        public function updateToAdmin($id)
        {
            $q = $this->_db->prepare('UPDATE FROM users SET admin = 1 where id = :id');
            $q->bindValue(':id', $id, PDO::PARAM_INT);
            $q->execute();
        }

        public function existToken($token){
            $q = $this->_db->prepare('SELECT COUNT(*) FROM password WHERE token = :token');
            $q->bindValue(':token', $token, PDO::PARAM_STR);
            $q->execute();
            if(!$q->fetchColumn(0))
                return false;
            else
                return true;
        }

        public function subscribe($zone,$email,$period)
        {
            $q = $this->_db->prepare('INSERT INTO newsletter (email,zone,delai) VALUES(:email,:zone,:period) ');
            $q->bindValue(':email', $email, PDO::PARAM_STR);
            $q->bindValue(':zone', $zone, PDO::PARAM_STR);
            $q->bindValue(':period', $period, PDO::PARAM_INT);
            try
            {
                $q->execute();
            }
            catch(Exception $e)
            {
                Throw $e;
            }
        }
    }