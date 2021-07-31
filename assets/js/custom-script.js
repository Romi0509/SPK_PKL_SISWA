/*================================================================================
	Item Name: Materialize - Material Design Admin Template
	Version: 5.0
	Author: PIXINVENT
	Author URL: https://themeforest.net/user/pixinvent/portfolio
================================================================================

NOTE:
------
PLACE HERE YOUR OWN JS CODES AND IF NEEDED.
WE WILL RELEASE FUTURE UPDATES SO IN ORDER TO NOT OVERWRITE YOUR CUSTOM SCRIPT IT'S BETTER LIKE THIS. */
$(document).ready(function() {
    $('.js-example-basic-single').select2();
});

$(document).on("click", "#deleteUser", function (e) {
	e.preventDefault();
	var id = $(this).parents("tr").attr("id");
	// console.log(this.id);
	// return;

	swal({
		title: "Apakah anda yakin?",
		// text: "Anda tidak akan dapat mengembalikan data yang dihapus!",
		icon: "warning",
		buttons: {
			cancel: true,
			delete: "Ya, hapus user!",
		},
	}).then((isConfirm) => {
		if (isConfirm) {
			console.log(id);
			$.ajax({
				url: `${BASE_URL}User/deleteAction`,
				type: "POST",
				data: { id: id },
				error: function (request, error) {
					console.log(arguments);
					alert(" Can't do because: " + error);
				},
				success: function (data) {
					swal({
						title: "Sukses!",
						text: "Data anda berhasil dihapus.",
						icon: "success",
					});
					setTimeout(function () {
						window.location.replace(`${BASE_URL}User`);
					}, 1000);
				},
			});
		} else {
			swal({ title: "Dibatalkan", text: "Data anda aman :)", icon: "error" });
		}
	});
});

$(document).on("click", "#deleteComp", function (e) {
	e.preventDefault();
	var id = $(this).data("comp");
	// console.log(this.id);
	// return;

	swal({
		title: "Apakah anda yakin?",
		// text: "Anda tidak akan dapat mengembalikan data yang dihapus!",
		icon: "warning",
		buttons: {
			cancel: true,
			delete: "Ya, hapus Perusahaan!",
		},
	}).then((isConfirm) => {
		if (isConfirm) {
			console.log(id);
			$.ajax({
				url: `${BASE_URL}Perusahaan/deleteAction`,
				type: "POST",
				data: { id: id },
				error: function (request, error) {
					console.log(arguments);
					alert(" Can't do because: " + error);
				},
				success: function (data) {
					swal({
						title: "Sukses!",
						text: "Data anda berhasil dihapus.",
						icon: "success",
					});
					setTimeout(function () {
						window.location.replace(`${BASE_URL}Perusahaan`);
					}, 1000);
				},
			});
		} else {
			swal({ title: "Dibatalkan", text: "Data anda aman :)", icon: "error" });
		}
	});
});

$(document).on("click", "#deleteAlternate", function (e) {
	e.preventDefault();
	var id = $(this).data("alternate");
	// console.log(this.id);
	// return;

	swal({
		title: "Apakah anda yakin?",
		// text: "Anda tidak akan dapat mengembalikan data yang dihapus!",
		icon: "warning",
		buttons: {
			cancel: true,
			delete: "Ya, hapus alternatif!",
		},
	}).then((isConfirm) => {
		if (isConfirm) {
			console.log(id);
			$.ajax({
				url: `${BASE_URL}Perusahaan/deleteActionAlternate`,
				type: "POST",
				data: { id: id },
				dataType: "json",
				error: function (request, error) {
					console.log(arguments);
					alert(" Can't do because: " + error);
				},
				success: function (res) {
					// console.log(res.pesan);
					// return;
					if (res.code == 0) {
						swal({
							title: "Gagal!",
							text: res.pesan,
							icon: "error",
						});
					} else {
						swal({
							title: "Sukses!",
							text: res.pesan,
							icon: "success",
						});
					}
					setTimeout(function () {
						window.location.replace(`${BASE_URL}Perusahaan/Alternative`);
					}, 1000);
				},
			});
		} else {
			swal({ title: "Dibatalkan", text: "Data anda aman :)", icon: "error" });
		}
	});
});

//perhitungan kriteria

$(document).ready(function () {
	// console.log($("#sum").val());
	// countCriteria();
	// function countCriteria() {
	revs();
	globalweight();
	calRank();
	// setNilaiBorda();
	rankGroup();
	// totalBorda();

	function revs() {
		$(".inputweight").each(function () {
			var target = $(this).attr("data-id");
			var weight_val = $(this).val();
			var reverse = 1 / parseFloat(weight_val);
			// var fx = Math.round((reverse + Number.EPSILON) * 100) / 100;
			var fx = reverse;
			$("#" + target).val(fx);
			total_kolom();
			normalisasi();
			konsistensi();
			lambda();
			ci();
			ir();
			cr();
		});
	}

	function globalweight() {
		var counter = $("#sum_sub").val();
		for (i = 1; i <= counter; i++) {
			var bobotcr = $("#wcriteria" + i).val();
			var bobotscr = $("#subcr" + i).val();
			var globalweight = bobotcr * bobotscr;
			$("#global_" + i).val(globalweight);
		}
	}

	function calRank() {
		var counter2 = $("#sum_sub").val();
		var counter = $("#sum_alter").val();
		for (i = 1; i <= counter; i++) {
			var sum = 0;
			for (j = 1; j <= counter2; j++) {
				var alternative = $("#xx_" + j + "yy_" + i).val();
				var global = $("#global_" + j).val();
				var times = global * alternative;
				console.log(times);
				console.log("+++++++++++++++++++++++++++++");
				sum += times;
				console.log(sum);
				console.log("=============================");
			}
			$("#nilairank_" + i).val(sum);
		}
	}

	$("#addRank").on("click", function () {
		$.ajax({
			type: "post",
			dataType: "json",
			url: `${BASE_URL}admin/Rank/deleteRank`,
			success: function (x) {
				console.log(x);
				var counter = $("#sum_alter").val();
				for (i = 1; i <= counter; i++) {
					$.ajax({
						type: "post",
						dataType: "json",
						url: `${BASE_URL}admin/Rank/saveRank`,
						data: {
							id_company: $("#nilairank_" + i).attr("data-idcompany"),
							rank_value: $("#nilairank_" + i).val(),
						},
						error: function () {
							shownotice("danger", "Gagal menyimpan data");
							$("#formentri select").removeAttr("disabled");
							$("#formentri button").removeAttr("disabled");
						},
						beforeSend: function () {
							$("#formentri select").attr("disabled", "disabled");
							$("#formentri button").attr("disabled", "disabled");
							shownotice("info", "Tunggu sebentar,lagi menyimpan data");
						},
						success: function (x) {
							console.log(x);
							window.location = `${BASE_URL}admin/Rank/Personal`;
							if (x == "Sukses menyimpan data!") {
								saveBobot();
								shownotice("success", "Sukses menyimpan data!");
							} else {
								shownotice("danger", "Gagal menyimpan data!");
							}
							$("#formentri select").removeAttr("disabled");
							$("#formentri button").removeAttr("disabled");
						},
					});
				}
			},
		});
	});

	function setNilaiBorda() {
		var counter = $("#sum_alter").val();
		var counter2 = $("#sum_anggota").val();
		var point = $("#sum_alter").val();
		for (i = 1; i <= counter2; i++) {
			for (j = 1; j <= counter; j++) {
				$("#user_" + i + "alter_" + j).val(point);
				point -= 1;
			}
		}
	}

	$(".inputweight").on("change", function () {
		var target = $(this).attr("data-id");
		var weight_val = $(this).val();
		var reverse = 1 / parseFloat(weight_val);
		// var fx = Math.round((reverse + Number.EPSILON) * 100) / 100;
		var fx = reverse;
		$("#" + target).val(fx);
		total_kolom();
		normalisasi();
		konsistensi();
		lambda();
		ci();
		ir();
		cr();

	});

	total_kolom();
	normalisasi();
	konsistensi();
	lambda();
	ci();
	ir();
	cr();

	$("#form_wcriteria").submit(function (e) {
		e.preventDefault();
		var pathname = window.location.pathname;
		var pathname2 = pathname.substring(pathname.lastIndexOf("/") + 1);
		var ser = $(this).serialize();
		// 		console.log(valuedata);
		// return;
		if (pathname2 == "Criteria") {
			var pathname3 = "admin/Weight/addCriteriaWeight";
			var valuedata = ser;
		} else if (pathname2 == "SubCriteria") {
			var pathname3 = "admin/Weight/addSubCriteriaWeight";
			var valuedata = ser;
		} else {
			var pathname3 = "admin/Weight/addWeightAlternate";
			var sc = $("#subcriteria_id").val();
			var sc2 = "&subcriteria_id=" + sc;
			var valuedata = ser + sc2;
		}
		// 		console.log(valuedata);
		// return;
		$.ajax({
			type: "post",
			dataType: "json",
			url: `${BASE_URL}${pathname3}`,
			data: valuedata,
			error: function(xhr, status, error) {
				console.log(xhr.responseText);
			  },
			beforeSend: function () {
				$("#formentri select").attr("disabled", "disabled");
				$("#formentri button").attr("disabled", "disabled");
				shownotice("info", "Tunggu sebentar,lagi menyimpan data");
			},
			success: function (x) {
					saveBobot();
				console.log(x);
				if (x == "Sukses menyimpan data!") {
					alert("Sukses Data Berhasil Disimpan!");
				} else {
					alert("Data Gagal Disimpan!");
				}
				$("#formentri select").removeAttr("disabled");
				$("#formentri button").removeAttr("disabled");
			},
		});
	});
});

function saveBobot() {
	var pathname = window.location.pathname;
	var pathname2 = pathname.substring(pathname.lastIndexOf("/") + 1);
	// console.log(pathname2);
	// 	return;
	if (pathname2 == "Criteria") {
		var pathname4 = "admin/Weight/addLastCriteriaWeight";
		var sc = "";
	} else if (pathname2 == "SubCriteria") {
		var pathname4 = "admin/Weight/addLastSubCriteriaWeight";
		var sc = "";
	} else {
		var pathname4 = "admin/Weight/addLastAlternativeWeight";
		var sc = $("#subcriteria_id").val();
	}
	var counter = $("#sum").val();

	for (i = 1; i <= counter; i++) {
		var idd = i;
		var bobot = $("#bobot_" + i).val();
		console.log(idd);	
		console.log(bobot);

		// return;
		$.ajax({
			type: "post",
			dataType: "json",
			url: `${BASE_URL}${pathname4}`,
			data: {
				id: idd,
				bobot: bobot,
				subcriteria: sc,
			},
			error: function () {
				shownotice("danger", "Gagal menyimpan data");
				$("#formentri select").removeAttr("disabled");
				$("#formentri button").removeAttr("disabled");
			},
			beforeSend: function () {
				$("#formentri select").attr("disabled", "disabled");
				$("#formentri button").attr("disabled", "disabled");
				shownotice("info", "Tunggu sebentar,lagi menyimpan data");
			},
			success: function (x) {
				console.log(x);
				if (x == "Sukses menyimpan data!") {
					// shownotice("success", "Sukses menyimpan data!");
					shownotice("success", "Sukses menyimpan data!");
				} else {
					// shownotice("danger", "Gagal menyimpan data!");
					shownotice("danger", "Gagal menyimpan data!");
				}
				$("#formentri select").removeAttr("disabled");
				$("#formentri button").removeAttr("disabled");
			},
		});
	}
}

function showmatrix() {
	$("#matrikdiv").toggle("fade");
}

function shownotice(tipe, pesan) {
	$("#respon").html(
		'<div class="alert alert-' + tipe + '">' + pesan + "</div>"
	);
	$("#respon").show("fadeIn");
	if ($("#respon").is(":visible")) {
		setTimeout(function () {
			$("#respon").hide("fadeOut");
		}, 3000);
	}
}

function total_kolom() {
	var counter = $("#sum").val();
	for (i = 1; i <= counter; i++) {
		var sum = 0;
		$(".kolom" + i).each(function () {
			sum += parseFloat($(this).val());
		});
		var fx = sum;
		$("#total" + i).val(fx);
	}
}
function normalisasi() {
	var counter = $("#sum").val();
	for (i = 1; i <= counter; i++) {
		var jml = 0;
		for (x = 1; x <= counter; x++) {
			var vtarget = $("#x" + x + "y" + i).val();
			// console.log(vtarget + " kolom");
			var vkolom = $("#total" + x).val();
			// console.log(vkolom);
			var rumus = parseFloat(vtarget) / parseFloat(vkolom);
			// var fx = Math.round((rumus + Number.EPSILON) * 1000) / 1000;
			var fx = rumus;
			jml += parseFloat(rumus);
			$("#n_x" + x + "y" + i).val(fx);
		}
		// var jumlahmnk = Math.round((jml + Number.EPSILON) * 1000) / 1000;
		var jumlahmnk = jml;
		var prio = parseFloat(jml) / parseFloat(counter);
		// var totprio = prio;
		$("#jumlah_" + i).val(jumlahmnk);
		$("#bobot_" + i).val(prio);
	}
}

function konsistensi() {
	var counter = $("#sum").val();

	for (i = 1; i <= counter; i++) {
		var total = 0;
		for (x = 1; x <= counter; x++) {
			var vtarget = $("#x" + x + "y" + i).val();
			var vbobot = $("#bobot_" + x).val();
			var rumus = parseFloat(vtarget) * parseFloat(vbobot);
			total += rumus;
		}
		var vbobot2 = $("#bobot_" + i).val();
		var rumus_devide = total / vbobot2;
		// var value_kons = Math.round((rumus_devide + Number.EPSILON) * 1000) / 1000;
		$("#kons_" + i).val(rumus_devide);
	}
}

function lambda() {
	var counter = $("#sum").val();
	var total = 0;
	for (i = 1; i <= counter; i++) {
		var kons = $("#kons_" + i).val();
		var rumus = parseFloat(kons);
		total += rumus;
	}
	var lambda = total / counter;
	$("#lambda_maks").val(lambda);
}

function ci() {
	var counter = parseFloat($("#sum").val());
	var lamb = parseFloat($("#lambda_maks").val());
	var count = (lamb - counter) / (counter - 1);

	$("#ci").val(count);
}

function ir() {
	var irdata = {
		1: 0,
		2: 0,
		3: 0.58,
		4: 0.9,
		5: 1.12,
		6: 1.24,
		7: 1.32,
		8: 1.41,
		9: 1.46,
		10: 1.49,
		11: 1.514,
		12: 1.536,
		13: 1.555,
		14: 1.571,
		15: 1.583,
		16: 1.597,
		17: 1.608,
		18: 1.618,
		19: 1.626,
		20: 1.634,
		21: 1.640,
		22: 1.647,
	};
	var counter = $("#sum").val();
	// console.log(irdata[counter]);
	var irnew = irdata[counter];
	$("#ir").val(irnew);
}

function cr() {
	var ci = parseFloat($("#ci").val());
	var ir = parseFloat($("#ir").val());

	var cr = ci / ir;
	$("#cr").val(cr);
	console.log(cr);
	if( cr > 0.1 ){
		$("#tombol_submit").attr('disabled', true);
	}else{
		$("#tombol_submit").attr('disabled', false);

	}
}

function rankGroup() {
	var counter = $("#sum_anggota").val();
	var counter2 = $("#sum_alter").val();

	for (i = 1; i <= counter; i++) {
		for (j = 1; j <= counter2; j++) {
			var idalter = $("#user" + i + "alter" + j).data("alterid");
			var valueBorda = $("#user" + i + "alter" + j).val();
			$("#user" + i + "alter" + idalter).val(valueBorda);
			// var nilai = $("#user" + i + "alter" + idalter).val();
		}
	}
}

    $('#example1').dataTable({
        "ordering": false
    });

	$('#example2').dataTable( {
		"scrollX": true,
		"ordering": false
	  } );
	
