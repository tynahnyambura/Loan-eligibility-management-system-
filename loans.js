function calculateScore(){

    let contribution =
        parseFloat(document.getElementById("contribution").value);

    let attendance =
        parseFloat(document.getElementById("attendance").value);

    let participation =
        parseFloat(document.getElementById("participation").value);



    let total =
        (contribution * 0.6) +
        (attendance * 0.2) +
        (participation * 0.2);



    document.getElementById("totalScore").innerHTML =
        "Total Score: " + total.toFixed(2);



    if(total >= 50){

        document.getElementById("eligibility").innerHTML =
            "Eligible For Loan";

        document.getElementById("eligibility").style.color =
            "green";
    }

    else{

        document.getElementById("eligibility").innerHTML =
            "Not Eligible For Loan";

        document.getElementById("eligibility").style.color =
            "red";
    }
}