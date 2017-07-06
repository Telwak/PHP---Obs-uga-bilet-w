    <?php
    interface Query_Select {public function Select();}
    interface Query_Insert {public function Insert();}
    interface Query_SelectSum {public function SelectSum();}

    abstract class DB
{
	protected $Login = "21727547_0000001";
    protected $Haslo = "Zf45kC,xU8xt";
	protected $Adres = "sql.serwer1657390.home.pl";
	protected $DB_name = "21727547_0000001";

	
	    public abstract function Conection_string();
		
}
class Zamowienia
{
	private $_Imie = null;
    private $_Pesel = null;
	private $_Email = null;
	private $_Ilosc = null;
	
	 public function __construct($Imie, $Pesel,$Email,$Ilosc)
    {
       $this->_Imie = $Imie;
       $this->_Pesel = $Pesel;
	   $this->_Email = $Email;
	   $this->_Ilosc = $Ilosc;
    }
    public function  __destruct()
    {
        $this->_Imie;
        $this->_Pesel;
        $this->_Email;
        $this->_Ilosc;
    }

    public function getImie()
    {
       return $this->_Imie;            
    }
	public function getPesel()
    {
       return $this->_Pesel;            
    }
	public function getEmail()
    {
       return $this->_Email;            
    }
	public function getIlosc()
    {
       return $this->_Ilosc;            
    }	
}


	class Login_model
	{
	private $_Login = null;
    private $_Haslo = null;
	private $_Imie = null;
	private $_Nazwisko = null;
	
	public function __construct($Imie, $Nazwisko,$Login,$Haslo)
    {
       $this->_Imie = $Imie;
       $this->_Nazwisko = $Nazwisko;
	   $this->_Login = $Login;
	   $this->_Haslo = $Haslo;
    }
    public function __destruct()
    {
        $this->_Imie;
        $this->_Nazwisko;
        $this->_Login;
        $this->_Haslo;
    }

        public function getImie()
    {
       return $this->_Imie;            
    }
	public function getNazwisko()
    {
       return $this->_Nazwisko;            
    }
	public function getLogin()
    {
       return $this->_Login;            
    }
	public function getHaslo()
    {
       return $this->_Haslo;            
    }	
	}
	
	class Rekordy
	{
	private $_Imie = null;
    private $_Pesel = null;
	private $_Email = null;
	private $_Ile = null;
	
	public function __construct($Imie, $Pesel,$Email,$Ile)
    {
       $this->_Imie = $Imie;
       $this->_Pesel = $Pesel;
	   $this->_Email = $Email;
	   $this->_Ile = $Ile;
    }
    public function  __destruct()
    {
        $this->_Imie;
        $this->_Pesel;
        $this->_Email;
        $this->_Ile;
    }

        public function getImie()
    {
       return $this->_Imie;            
    }
	public function getPesel()
    {
       return $this->_Pesel;            
    }
	public function getEmail()
    {
       return $this->_Email;            
    }
	public function getIle()
    {
       return $this->_Ile;            
    }
	}

?>