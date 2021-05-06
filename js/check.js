function ellenorzes()
{
    var nev=document.getElementById("username").value;
    var pw=document.getElementById("pw").value;

    if(nev=="" || pw=="")
    {
        alert("A név és jelszó kitöltése kötelező!");
    }
}

function rogzit_validate()
{
    var d=document.getElementById("datum").value;
    var hon=document.getElementById("honnan").value;
    var hov=document.getElementById("hova").value;
    var km=document.getElementById("km").value;

    var hon_hossz=document.getElementById("honnan").value.length;
    var hov_hossz=document.getElementById("honnan").value.length;

    var count=0;

    if(isNaN(km))
    {
        alert("A kilométer számban adja meg!");
        return false;
    }

    if(hon_hossz<3 || hov_hossz<3)
    {
        alert("A honnan és hova mezőnek legalább 3 karakter hosszúnak kell lennie!");
        return false;
    }

    if(d=="" || hon=="" || hov=="" || km=="")
    {
        alert("Adja meg az összes értéket!");
        return false;
    }

    
    return true;
}