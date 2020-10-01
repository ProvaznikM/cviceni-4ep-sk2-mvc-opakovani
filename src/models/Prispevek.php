<?php

class Prispevek
{
    private $nazev;
    private $obsah;

    public function __construct($nazev, $obsah)
    {
        $this->nazev = $nazev;
        $this->obsah = $obsah;
    }

    public function vytvor_prispevek()
    {
        $spojeni = DB::pripojit();
        $dotaz = "INSERT INTO 4ep_sk2_mvc_uzivatele (jmeno, heslo) VALUES ('$this->nazev', '$this->obsah')";

        mysqli_query($spojeni, $dotaz);

        return mysqli_affected_rows($spojeni) == 1;
    }

    static public function existuje_prispevek($nazev, $obsah)
    {
        $spojeni = DB::pripojit();

        $dotaz = "SELECT * FROM 4ep_sk2_mvc_uzivatele WHERE jmeno='$jmeno'";
        $vysledek = mysqli_query($spojeni, $dotaz);

        if(mysqli_num_rows($vysledek) == 1)
        {
            return true;
        }
        else
        {
            return false;
        }
    }
}