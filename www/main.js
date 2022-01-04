// ví dụ sử dụng javascript thuần
window.addEventListener("load", () => {
	let title = document.querySelector("h3");

	title.onmouseover = () => {
		title.style.color = "deeppink";
	};

	title.addEventListener("mouseleave", () => {
		title.style.color = "black";
	});
});

// ví dụ sử dụng jquery
$(document).ready(() => {
	$("#test").on("click", () => {
		$("h3").html("jQuery đã hoạt động");
	});
});

function add_department() {
	let form = document.getElementById('add_department_form');
		form.addEventListener('submit', e => {
			e.preventDefault();

			let id = document.getElementById('maphongban').value;
			let name = document.getElementById('tenphongban').value;
			let room = document.getElementById('room').value;
			let detail = document.getElementById('detail').value;

			if (id === '' || name === '' || room === '' || detail === '') {
				return alert('Invalid input');
			}

		
			fetch("http://localhost/WebAssignment/www/api/add_department.php",
			{
				headers: {
					'Accept': 'application/json',
					'Content-Type': 'application/json'
				},
				method: "POST",
				body:  JSON.stringify({ 'id': id, 'name': name, 'room': room ,'detail':detail})
			})
			.then(function(res){ console.log(res) })
			.catch(function(res){ console.log(res) })
			}
		)
		location.reload();
		// modal.style.display="none";
}
