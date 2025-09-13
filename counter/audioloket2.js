
var num;
var loket;

function playAudio(num,loket) { 
var num1 = num;
	(function() {
		var numstring = num.toString();
		var res = numstring.split("");
		var numlenght = numstring.length;
		var Mp3Queue = function(container, files) {
			var index = 1;
			var nextindex;
			if(!container || !container.tagName || container.tagName !== 'AUDIO')throw 'Invalid container';
			if(!files || !files.length)throw 'Invalid files array';        
			var playNext = function() {
				// panggil nomor urut 1 sampai 9
				if (numlenght == 1) {
					if(index < files.length) {
						container.src = files[index];
						index += 1;
						if (index == 3) {
							if (num == 1){
								index = 3;
							} else if (num == 2){
								index = 4;
							} else if (num == 3){
								index = 5;
							} else if (num == 4){
								index = 6;
							} else if (num == 5){
								index = 7;
							} else if (num == 6){
								index = 8;
							} else if (num == 7){
								index = 9;
							} else if (num == 8){
								index = 10;
							} else if (num == 9){
								index = 11;
							}
						} else if (index > 3) {
							if (num > 0){
								index = 18;	
							}
							num = 0;
						}
					} else {
						container.removeEventListener('ended', playNext, false);
					}
				// panggil nomor urut 10 sampai 99
				} else if (numlenght == 2) {
					if(index < files.length) {
						container.src = files[index];
						index += 1;
						if (index == 3) {
							if (num == 10){
								index = 12;
								num = -1;
							} else if (num == 11){
								index = 13;
								num = -1;
							} else if (num >= 12 && num <=19){
								if (res[1] == 2) {
									index = 4;
								} else if (res[1] == 3) {
									index = 5;
								} else if (res[1] == 4) {
									index = 6;
								} else if (res[1] == 5) {
									index = 7;
								} else if (res[1] == 6) {
									index = 8;
								} else if (res[1] == 7) {
									index = 9;
								} else if (res[1] == 8) {
									index = 10;
								} else if (res[1] == 9) {
									index = 11;
								}
							} else if (num >= 20 ){
								if (res[1] == 0) {
									if (res[0] == 2){
										index = 4;
									} else if (res[0] == 3){
										index = 5;
									} else if (res[0] == 4){
										index = 6;
									} else if (res[0] == 5){
										index = 7;
									} else if (res[0] == 6){
										index = 8;
									} else if (res[0] == 7){
										index = 9;
									} else if (res[0] == 8){
										index = 10;
									} else if (res[0] == 9){
										index = 11;
									} 
								} else if (res[1] == 1) {
									if (res[0] == 2){
										index = 4;
									} else if (res[0] == 3){
										index = 5;
									} else if (res[0] == 4){
										index = 6;
									} else if (res[0] == 5){
										index = 7;
									} else if (res[0] == 6){
										index = 8;
									} else if (res[0] == 7){
										index = 9;
									} else if (res[0] == 8){
										index = 10;
									} else if (res[0] == 9){
										index = 11;
									}
								} else if (res[1] == 2) {
									if (res[0] == 2){
										index = 4;
									} else if (res[0] == 3){
										index = 5;
									} else if (res[0] == 4){
										index = 6;
									} else if (res[0] == 5){
										index = 7;
									} else if (res[0] == 6){
										index = 8;
									} else if (res[0] == 7){
										index = 9;
									} else if (res[0] == 8){
										index = 10;
									} else if (res[0] == 9){
										index = 11;
									}
								} else if (res[1] == 3) {
									if (res[0] == 2){
										index = 4;
									} else if (res[0] == 3){
										index = 5;
									} else if (res[0] == 4){
										index = 6;
									} else if (res[0] == 5){
										index = 7;
									} else if (res[0] == 6){
										index = 8;
									} else if (res[0] == 7){
										index = 9;
									} else if (res[0] == 8){
										index = 10;
									} else if (res[0] == 9){
										index = 11;
									}
								} else if (res[1] == 4) {
									if (res[0] == 2){
										index = 4;
									} else if (res[0] == 3){
										index = 5;
									} else if (res[0] == 4){
										index = 6;
									} else if (res[0] == 5){
										index = 7;
									} else if (res[0] == 6){
										index = 8;
									} else if (res[0] == 7){
										index = 9;
									} else if (res[0] == 8){
										index = 10;
									} else if (res[0] == 9){
										index = 11;
									}
								} else if (res[1] == 5) {
									if (res[0] == 2){
										index = 4;
									} else if (res[0] == 3){
										index = 5;
									} else if (res[0] == 4){
										index = 6;
									} else if (res[0] == 5){
										index = 7;
									} else if (res[0] == 6){
										index = 8;
									} else if (res[0] == 7){
										index = 9;
									} else if (res[0] == 8){
										index = 10;
									} else if (res[0] == 9){
										index = 11;
									}
								} else if (res[1] == 6) {
									if (res[0] == 2){
										index = 4;
									} else if (res[0] == 3){
										index = 5;
									} else if (res[0] == 4){
										index = 6;
									} else if (res[0] == 5){
										index = 7;
									} else if (res[0] == 6){
										index = 8;
									} else if (res[0] == 7){
										index = 9;
									} else if (res[0] == 8){
										index = 10;
									} else if (res[0] == 9){
										index = 11;
									}
								} else if (res[1] == 7) {
									if (res[0] == 2){
										index = 4;
									} else if (res[0] == 3){
										index = 5;
									} else if (res[0] == 4){
										index = 6;
									} else if (res[0] == 5){
										index = 7;
									} else if (res[0] == 6){
										index = 8;
									} else if (res[0] == 7){
										index = 9;
									} else if (res[0] == 8){
										index = 10;
									} else if (res[0] == 9){
										index = 11;
									}
								} else if (res[1] == 8) {
									if (res[0] == 2){
										index = 4;
									} else if (res[0] == 3){
										index = 5;
									} else if (res[0] == 4){
										index = 6;
									} else if (res[0] == 5){
										index = 7;
									} else if (res[0] == 6){
										index = 8;
									} else if (res[0] == 7){
										index = 9;
									} else if (res[0] == 8){
										index = 10;
									} else if (res[0] == 9){
										index = 11;
									}
								} else if (res[1] == 9) {
									if (res[0] == 2){
										index = 4;
									} else if (res[0] == 3){
										index = 5;
									} else if (res[0] == 4){
										index = 6;
									} else if (res[0] == 5){
										index = 7;
									} else if (res[0] == 6){
										index = 8;
									} else if (res[0] == 7){
										index = 9;
									} else if (res[0] == 8){
										index = 10;
									} else if (res[0] == 9){
										index = 11;
									}
								}
							}
						} else if (index > 3) {
							if (num >= 12 && num <= 19){
								index = 14;
								num = -1;
							} else if (num >= 20){
								if (res[1] == 0){
									index = 15;
									num = -1;
								} else {
									index = 15;
									num = -2;
								}
							} else if (num == -2){
								if (res[1] == 1){
									index = 3;	
								} else if (res[1] == 2){
									index = 4;
								} else if (res[1] == 3){
									index = 5;
								} else if (res[1] == 4){
									index = 6;
								} else if (res[1] == 5){
									index = 7;
								} else if (res[1] == 6){
									index = 8;
								} else if (res[1] == 7){
									index = 9;
								} else if (res[1] == 8){
									index = 10;
								} else if (res[1] == 9){
									index = 11;
								} 
								num = -1;
							} else if (num == -1){
								index = 18;	
								num = 0;
							}
						}
					} else {
						container.removeEventListener('ended', playNext, false);
					}
				// panggil nomor urut 100 sampai 999
				} else if (numlenght == 3) {
					if(index < files.length) {
						container.src = files[index];
						index += 1;
						if (index == 3) {
							if (res[0] == 1){
								index = 17;
							}else if (num >= 200){
									if (res[0] == 2){
										index = 4;
									} else if (res[0] == 3){
										index = 5;
									} else if (res[0] == 4){
										index = 6;
									} else if (res[0] == 5){
										index = 7;
									} else if (res[0] == 6){
										index = 8;
									} else if (res[0] == 7){
										index = 9;
									} else if (res[0] == 8){
										index = 10;
									} else if (res[0] == 9){
										index = 11;
									} 
							}
						}else if (index > 3) {
							if (num == 100){
								num == -1;
							} else if (num > 100 && num < 200){
								if (res[1] == 0){
									if (res[2] == 1){
										index = 3;
									} else if (res[2] == 2){
										index = 4;
									} else if (res[2] == 3){
										index = 5;
									} else if (res[2] == 4){
										index = 6;
									} else if (res[2] == 5){
										index = 7;
									} else if (res[2] == 6){
										index = 8;
									} else if (res[2] == 7){
										index = 9;
									} else if (res[2] == 8){
										index = 10;
									} else if (res[2] == 9){
										index = 11;
									} 
									num = -1;
								} else if (res[1] == 1){
									if (res[2] == 0){
										index = 12;
										num = -1;
									} else if (res[2] == 1){
										index = 13;
										num = -1;
									} else if (res[2] >= 2){
										if (res[2] == 2){
											index = 4;
										} else if (res[2] == 3){
											index = 5;
										} else if (res[2] == 4){
											index = 6;
										} else if (res[2] == 5){
											index = 7;
										} else if (res[2] == 6){
											index = 8;
										} else if (res[2] == 7){
											index = 9;
										} else if (res[2] == 8){
											index = 10;
										} else if (res[2] == 9){
											index = 11;
										}
										num = -2;
									}
								} else if (res[1] >= 2){
									if (res[2] == 0){
										if (res[1] == 2){
											index = 4;
										} else if (res[1] == 3){
											index = 5;
										} else if (res[1] == 4){
											index = 6;
										} else if (res[1] == 5){
											index = 7;
										} else if (res[1] == 6){
											index = 8;
										} else if (res[1] == 7){
											index = 9;
										} else if (res[1] == 8){
											index = 10;
										} else if (res[1] == 9){
											index = 11;
										}
										num = -3;
									} else if (res[2] >= 1){
										if (res[1] == 2){
											index = 4;
										} else if (res[1] == 3){
											index = 5;
										} else if (res[1] == 4){
											index = 6;
										} else if (res[1] == 5){
											index = 7;
										} else if (res[1] == 6){
											index = 8;
										} else if (res[1] == 7){
											index = 9;
										} else if (res[1] == 8){
											index = 10;
										} else if (res[1] == 9){
											index = 11;
										}
										num = -4;
									}
									
								}
							} else if (num >= 200){
								if ((res[1] == 0) && (res[2] == 0)) {
									index = 16;
									num = -1;
								}else {
									index = 16;
									num = -6;
								}
							} else if (num == -6){
								if (res[1] == 0){
									if (res[2] == 1){
										index = 3;
									} else if (res[2] == 2){
										index = 4;
									} else if (res[2] == 3){
										index = 5;
									} else if (res[2] == 4){
										index = 6;
									} else if (res[2] == 5){
										index = 7;
									} else if (res[2] == 6){
										index = 8;
									} else if (res[2] == 7){
										index = 9;
									} else if (res[2] == 8){
										index = 10;
									} else if (res[2] == 9){
										index = 11;
									}
									num = -1;
								} else if (res[1] == 1){
									if (res[2] == 0){
										index = 12;
										num = -1;
									} else if (res[2] == 1){
										index = 13;
										num = -1;
									} else if (res[2] >= 2){
										if (res[2] == 2){
											index = 4;
										} else if (res[2] == 3){
											index = 5;
										} else if (res[2] == 4){
											index = 6;
										} else if (res[2] == 5){
											index = 7;
										} else if (res[2] == 6){
											index = 8;
										} else if (res[2] == 7){
											index = 9;
										} else if (res[2] == 8){
											index = 10;
										} else if (res[2] == 9){
											index = 11;
										}
										num = -2;
									} 
								} else if (res[1] >= 2){
									if (res[2] == 0){
										if (res[1] == 2){
											index = 4;
										} else if (res[1] == 3){
											index = 5;
										} else if (res[1] == 4){
											index = 6;
										} else if (res[1] == 5){
											index = 7;
										} else if (res[1] == 6){
											index = 8;
										} else if (res[1] == 7){
											index = 9;
										} else if (res[1] == 8){
											index = 10;
										} else if (res[1] == 9){
											index = 11;
										}
										num = -3;
									} else if (res[2] >= 1){
										if (res[1] == 2){
											index = 4;
										} else if (res[1] == 3){
											index = 5;
										} else if (res[1] == 4){
											index = 6;
										} else if (res[1] == 5){
											index = 7;
										} else if (res[1] == 6){
											index = 8;
										} else if (res[1] == 7){
											index = 9;
										} else if (res[1] == 8){
											index = 10;
										} else if (res[1] == 9){
											index = 11;
										}
										num = -4;
									}
									
								}
							} else if (num == -5){
								if (res[2] == 1){
									index = 3;	// untuk puluhan
								} else if (res[2] == 2){
									index = 4;
								} else if (res[2] == 3){
									index = 5;
								} else if (res[2] == 4){
									index = 6;
								} else if (res[2] == 5){
									index = 7;
								} else if (res[2] == 6){
									index = 8;
								} else if (res[2] == 7){
									index = 9;
								} else if (res[2] == 8){
									index = 10;
								} else if (res[2] == 9){
									index = 11;
								}
								num = -1;
							}  else if (num == -7){
								index = 16;	// untuk ratus
								
							} else if (num == -1){
								index = 18;	// langsung ke loket
								num = 0;
							} else if (num == -2){
								index = 14;	// untuk belasan
								num = -1;
							} else if (num == -3){
								index = 15;	// untuk puluhan
								num = -1;
							} else if (num == -4){
								index = 15;	// untuk puluhan
								num = -5;
							} 
						} 
					} else {
						container.removeEventListener('ended', playNext, false);
					}
				}
			};
			container.addEventListener('ended', playNext);
			container.src = files[0];
		};
		var container = document.getElementById('container');			
			new Mp3Queue(container, [
				'suara/ding.mp3',		// 0
				'suara/nomor-urut.mp3',	// 1
				'suara/a.mp3',			// 2
				'suara/satu.mp3',		// 3
				'suara/dua.mp3',		// 4
				'suara/tiga.mp3',		// 5
				'suara/empat.mp3',		// 6
				'suara/lima.mp3',		// 7
				'suara/enam.mp3',		// 8
				'suara/tujuh.mp3',		// 9
				'suara/delapan.mp3',	// 10
				'suara/sembilan.mp3',	// 11
				'suara/sepuluh.mp3',	// 12
				'suara/sebelas.mp3',	// 13
				'suara/belas.mp3',		// 14
				'suara/puluh.mp3',		// 15
				'suara/ratus.mp3',		// 16
				'suara/seratus.mp3',	// 17
				'suara/loket.mp3',		// 18
				'suara/dua.mp3'		// 19
				
			]);
	})();
}
