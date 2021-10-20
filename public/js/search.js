window.addEventListener("load", (e) => {
    const d = document;
    let $search = d.getElementById("search"),
        $searchCancel = d.getElementById("searchCancel"),
        $consults = d.getElementById("results"),
        $rhombus = d.querySelector(".rhombus"),
        $results = d.getElementById("results");

    $search.addEventListener("keyup", (e) => {
        let input = e.target.value;

        if (input.length > 1) {
            fetch(`http://instagram.open/search/${input}`)
                .then((res) => {
                    //toggle
                    console.log(res);
                    return res.ok ? res.text() : Promise.reject();
                })
                .then((html) => {
                    $consults.innerHTML = html;

                    $rhombus.style.display = "block";
                    $results.style.display = "block";
                    $searchCancel.style.display = "block";
                })
                .catch((err) => {
                    console.log("error");
                    $consults.innerHTML = `<p>No se encuentran resultados</p>`;
                });
        } else if (input.length == 0) {
            $rhombus.style.display = "none";
            $results.style.display = "none";
        }
    });

    //cancel search
    $searchCancel.addEventListener("click", (e) => {
        console.log(e.target);
        $searchCancel.style.display = "none";
        $rhombus.style.display = "none";
        $results.style.display = "none";
    });
});
