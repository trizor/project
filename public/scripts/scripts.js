function showhideandrey()
{
    block1=document.getElementById('service');
    if (block1.style.display == "none")
    {
        block1.style.display = "block";
    }
    else
    {
        block1.style.display = "none";
    }
}



function showhide()
{
    block1=document.getElementById('reason');
    block2=document.getElementById('offContract');
    if (block1.style.display == "none"||block1.style.display == "compact")
    {
        block1.style.display = "block";
        block2.style.display = "none";
    }
    else
    {
        block1.style.display = "none";
    }
}


function transmit()
{
    block1=document.getElementById('bloc1');
    block2=document.getElementById('search_button');
    block2.href="/search/"+block1.value;

}

function showhideandrey1()
{
    block1=document.getElementById('order');
    if (block1.style.display == "none")
    {
        block1.style.display = "block";
    }
    else
    {
        block1.style.display = "none";
    }
}

function clickOnDiv()
{
    document.getElementById('ok').onclick();
}

function print_(){
    window.print() ;
}



