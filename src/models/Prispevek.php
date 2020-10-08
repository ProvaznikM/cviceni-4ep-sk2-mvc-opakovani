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

    public function vytvor()
    {
        $spojeni = DB::pripojit();
        $dotaz = "INSERT INTO 4ep_sk2_mvc_prispevky (nazev, obsah) VALUES ('$this->nazev', '$this->obsah')";

        mysqli_query($spojeni, $dotaz);

        return mysqli_affected_rows($spojeni) == 1;
    }

    static public function existuje($nazev, $obsah)
    {
        $spojeni = DB::pripojit();

        $dotaz = "SELECT * FROM 4ep_sk2_mvc_prispevky WHERE nazev='$nazev'";
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