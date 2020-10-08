<?php

class Prispevky
{
    private function mam_dostatek_dat_k_vytvoreni()
    {
        // kontrola vyplnění formuláře
        if(!isset($_POST["nazev"]))
            return false;
        if(!isset($_POST["obsah"]))
            return false;
        
        return true;
    }

    private function data_k_vytvoreni_jsou_v_pradku($nazev, $obsah)
    {
        // kotrola pozadavku na prispevek
        if(strlen($nazev) < 1)
            return false;
        if(strlen($obsah) < 1)
            return false;

        return true;
    }

    public function vytvoreni()
    {
        if($this->mam_dostatek_dat_k_vytvoreni())
        {
            $nazev = trim($_POST["nazev"]);
            $obsah = trim($_POST["obsah"]);

            if($this->data_k_vytvoreni_jsou_v_pradku($nazev, $obsah))
            {
                $prispevek = new Prispevek($nazev, $obsah);

                if($prispevek->vytvor())
                {
                    // prispevek je uspesne vytvoren
                    // presmeruji ho na vytvoreni
                    return spustit("prispevky", "vytvorit");
                }
                else
                {
                    // vytvoreni selhalo na urovni modelu
                    return spustit("stranky", "chyba");
                }
            }
            else
            {
                // data ve formulari nejsou v pradku
                require_once "views/prispevky/vytvorit.php";
            }

        }
        else
        {
            // data ve formulari nejsou kompletni
            require_once "views/prispevky/vytvorit.php";
        }
    }

    public function vytvorit()
    {
        if($this->mam_dostatek_dat_k_vytvoreni())
        {
            $nazev = trim($_POST["nazev"]);
            $obsah = trim($_POST["obsah"]);

            if(Prispevek::existuje($nazev, $obsah))
            {
                session_destroy();
                session_start();

                $_SESSION["prispevky"] = $nazev;

                global $zakladni_url;

                header("location".$zakladni_url."index.php/stranky/profil");
            }
            else
            {
                require_once "views/prispevky/vytvorit";
            }
        }
        else
        {
            require_once "views/prispevky/vytvorit";
        }
    }
}
