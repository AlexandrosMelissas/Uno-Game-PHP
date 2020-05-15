function fill_table() {
	$.ajax({
		url: "uno.php/board",
		method: "POST",
		success: function show_table_json(x) {
			if (x != "failed") {
				document.getElementById("table").innerHTML = "";
				for (var i = 0; i < x.length; i++) {
					var color = x[i].color;
					switch (color) {
						case "no_color":
							var t =
								"<li class='d-inline h3 text-dark pr-2 border border-dark'>" +
								x[i].card_name +
								"</li>";
							$("#table").append(t);
							break;
						case "green":
							var t =
								"<li class='d-inline h3 text-success pr-2 border border-dark'>" +
								x[i].card_name +
								"</li>";
							$("#table").append(t);
							break;
						case "blue":
							var t =
								"<li class='d-inline h3 text-primary pr-2 border border-dark'>" +
								x[i].card_name +
								"</li>";
							$("#table").append(t);
							break;
						case "red":
							var t =
								"<li class='d-inline h3 text-danger pr-2 border border-dark'>" +
								x[i].card_name +
								"</li>";
							$("#table").append(t);
							break;
						case "yellow":
							var t =
								"<li class='d-inline h3 text-warning pr-2 border border-dark'>" +
								x[i].card_name +
								"</li>";
							$("#table").append(t);
							break;
					}
				}

				$.each(function(i, x) {
					$("#table").append("<li>" + x.card_name + "</li>");
				});
			} else {
				alert(
					"Μην βιάζεστε! Περιμένετε τον αντίπαλό σας! \n Μπορεί να κόλλησε στη στάση του 52!"
				);
			}
		}
	});
}

$(document).on("click", "#do_move", function() {
	var card = $("#move").val();
	var a = card.trim().toUpperCase();
	if (a == "") {
		a = "x";
	}

	$.ajax({
		url: "uno.php/board/card/" + a,
		method: "PUT",
		dataType: "json",
		error: function(x) {
			alert(x.responseJSON["error"]);
		},
		success: function(x) {
			if (x == "win") {
				alert("Νικήσατε!");
				fill_table();
			}
		}
	});
	$("#moves").empty();
});

$(document).on("click", "#uno", function() {
	$.ajax({
		url: "uno.php/board/uno",
		method: "PUT",
		dataType: "json",
		error: function(x) {
			alert(x.responseJSON["error"]);
		}
	});
});

$(document).on("click", "#paso", function() {
	$.ajax({
		url: "uno.php/board/paso",
		method: "PUT",
		dataType: "json",
		error: function(x) {
			alert(x.responseJSON["error"]);
		}
	});
	$("#moves").empty();
});

$(document).on("click", "#draw", function() {
	$.ajax({
		url: "uno.php/board/draw",
		method: "PUT",
		dataType: "json",
		error: function(x) {
			alert(x.responseJSON["error"]);
		}
	});
});

$(document).ready(function() {
	show_opponent();
	show_number_of_cards();
	show_playing_card_timer();
	show_remaining_deck();
	show_cards_timer();
	show_turn();
	show_moves();
});

function show_opponent() {
	if (
		document.getElementById("opponent").innerHTML == "Waiting for opponent..."
	) {
		setInterval(function() {
			$("#opponent")
				.load("lib/show_opponent.php")
				.fadeIn("slow");
		}, 3000);
	}
}

function show_number_of_cards() {
	setInterval(function() {
		$("#opp_cards")
			.load("lib/show_number_of_cards.php")
			.fadeIn("slow");
	}, 2000);
}

function show_turn() {
	setInterval(function() {
		$(".turn")
			.load("lib/show_turn.php")
			.fadeIn("slow");
	}, 2000);
}

function show_moves() {
	setInterval(function() {
		if ($("#moves").text().length == 0)
			$("#moves")
				.load("lib/show_moves.php")
				.fadeIn("slow");
	}, 3000);
}

function show_remaining_deck() {
	setInterval(function() {
		$("#remaining_deck")
			.load("lib/show_remaining_deck.php")
			.fadeIn("slow");
	}, 2000);
}

function show_playing_card_timer() {
	setInterval(function() {
		show_playing_card();
	}, 3000);
}

function show_cards_timer() {
	setInterval(function() {
		show_cards();
	}, 3000);
}

function show_playing_card() {
	$.ajax("lib/show_playing_card.php", {
		success: function show_playing_card2(x) {
			$("#playing_card").empty();
			for (var i = 0; i < x.length; i++) {
				var color = x[i].color;
				switch (color) {
					case "no_color":
						var t =
							"<span class='d-inline-block h3 text-dark'>" +
							x[i].card_name +
							"</span>";
						$("#playing_card").append(t);
						break;
					case "green":
						var t =
							"<span class='d-inline-block h3 text-success'>" +
							x[i].card_name +
							"</span>";
						$("#playing_card").append(t);
						break;
					case "blue":
						var t =
							"<span class='d-inline-block h3 text-primary'>" +
							x[i].card_name +
							"</span>";
						$("#playing_card").append(t);
						break;
					case "red":
						var t =
							"<span class='d-inline-block h3 text-danger'>" +
							x[i].card_name +
							"</span>";
						$("#playing_card").append(t);
						break;
					case "yellow":
						var t =
							"<span class='d-inline-block h3 text-warning'>" +
							x[i].card_name +
							"</span>";
						$("#playing_card").append(t);
						break;
				}
			}

			$.each(function(i, x) {
				$(".playing_card").append("<span>" + x[i].card_name + "</span>");
			});
		}
	});
}

function show_cards() {
	$.ajax("lib/show_cards.php", {
		success: function show_table_json(x) {
			document.getElementById("table").innerHTML = "";
			// $("#table").html("<ul style='list-style-type: none;' id='cards'></ul>");
			for (var i = 0; i < x.length; i++) {
				var color = x[i].color;
				switch (color) {
					case "no_color":
						var t =
							"<li class='d-inline-block h3 text-dark pr-2 border border-dark'>" +
							x[i].card_name +
							"</li>";
						$("#table").append(t);
						break;
					case "green":
						var t =
							"<li class='d-inline-block h3 text-success pr-2 border border-dark'>" +
							x[i].card_name +
							"</li>";
						$("#table").append(t);
						break;
					case "blue":
						var t =
							"<li class='d-inline-block h3 text-primary pr-2 border border-dark'>" +
							x[i].card_name +
							"</li>";
						$("#table").append(t);
						break;
					case "red":
						var t =
							"<li class='d-inline-block h3 text-danger pr-2 border border-dark'>" +
							x[i].card_name +
							"</li>";
						$("#table").append(t);
						break;
					case "yellow":
						var t =
							"<li class='d-inline-block h3 text-warning pr-2 border border-dark'>" +
							x[i].card_name +
							"</li>";
						$("#table").append(t);
						break;
				}
			}

			$.each(function(i, x) {
				$("#table").append("<li>" + x.card_name + "</li>");
			});
		}
	});
}
