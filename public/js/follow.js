const d = document;

window.addEventListener("load", (e) => {
    d.addEventListener("click", (e) => {
        //follow
        if (e.target.matches("#follow")) {
            let target = e.target;
            e.preventDefault();
            console.log(target);
            let id_follow = target.getAttribute("data-id");
            fetch(`http://instagram.open/follow/${id_follow}`)
                .then((res) => {
                    target.setAttribute("id", "unfollow");
                    target.textContent = "Unfollow";
                    console.log(res);
                    return res.ok ? res.json() : Promise.reject();
                })
                .catch((err) => {
                    console.log(err);
                });
        }
        //unfollow
        if (e.target.matches("#unfollow")) {
            let target = e.target;
            e.preventDefault();
            console.log(target);
            let id_follow = target.getAttribute("data-id");
            fetch(`http://instagram.open/follow/remove/${id_follow}`)
                .then((res) => {
                    target.setAttribute("id", "follow");
                    target.textContent = "Follow";
                    console.log(res);
                    return res.ok ? res.json() : Promise.reject();
                })
                .catch((err) => {
                    console.log(err, "error al hacer unfollow");
                });
        }
    });
});
