
var num;
var loket;
function playAudio(num,loket) { 
jum = num.length;
//alert(num);
(function() {
	
    var Mp3Queue = function(container, files) {
        var index = 1;
        if(!container || !container.tagName || container.tagName !== 'AUDIO')throw 'Invalid container';
        if(!files || !files.length)throw 'Invalid files array';        
        
        var playNext = function() {
            if(index < files.length) {
                container.src = files[index];
                index += 1;
            } else {
                container.removeEventListener('ended', playNext, false);
            }
        };
        
        container.addEventListener('ended', playNext);
        
        container.src = files[0];
    };
    
	var container = document.getElementById('container');
	
	new Mp3Queue(container, [
		'suara/nomor-urut.wav'
	]);
	container.play();
})();

if (num == 21){
	if (loket == 1){
		(function() {
			
			var Mp3Queue = function(container, files) {
				var index = 1;
				if(!container || !container.tagName || container.tagName !== 'AUDIO')throw 'Invalid container';
				if(!files || !files.length)throw 'Invalid files array';        
				
				var playNext = function() {
					if(index < files.length) {
						container.src = files[index];
						index += 1;
					} else {
						container.removeEventListener('ended', playNext, false);
					}
				};
				
				container.addEventListener('ended', playNext);
				
				container.src = files[0];
			};
			
			var container = document.getElementById('container');
			
			new Mp3Queue(container, [
				'suara/nomor-urut.wav',
				'suara/dua.wav',
				'suara/puluh.wav',
				'suara/satu.wav',
				'suara/loket.wav',
				'suara/satu.wav'
			]);
			container.play();
		})();
	} else if (loket  == 2) {
		(function() {
				var Mp3Queue = function(container, files) {
				var index = 1;
				if(!container || !container.tagName || container.tagName !== 'AUDIO')throw 'Invalid container';
				if(!files || !files.length)throw 'Invalid files array';        
				
				var playNext = function() {
					if(index < files.length) {
						container.src = files[index];
						index += 1;
					} else {
						container.removeEventListener('ended', playNext, false);
					}
				};
				
				container.addEventListener('ended', playNext);
				
				container.src = files[0];
			};
			
			var container = document.getElementById('container');
			
			new Mp3Queue(container, [
				'suara/nomor-urut.wav',
				'suara/dua.wav',
				'suara/puluh.wav',
				'suara/satu.wav',
				'suara/loket.wav',
				'suara/dua.wav'
			]);
			container.play();
		})();
	}
}

 else if(num == 202){
	 if (loket == 1){
		(function() {
			var Mp3Queue = function(container, files) {
				var index = 1;
				if(!container || !container.tagName || container.tagName !== 'AUDIO')throw 'Invalid container';
				if(!files || !files.length)throw 'Invalid files array';        
				
				var playNext = function() {
					if(index < files.length) {
						container.src = files[index];
						index += 1;
					} else {
						container.removeEventListener('ended', playNext, false);
					}
				};
				
				container.addEventListener('ended', playNext);
				
				container.src = files[0];
			};
			
			var container = document.getElementById('container');
			
			new Mp3Queue(container, [
				'suara/nomor-urut.wav',
				'suara/dua.wav',
				'suara/ratus.wav',
				'suara/dua.wav',
				'suara/loket.wav',
				'suara/satu.wav'
			]);
			container.play();
		})();
	 } else if (loket  == 2) {
		 (function() {
			var Mp3Queue = function(container, files) {
				var index = 1;
				if(!container || !container.tagName || container.tagName !== 'AUDIO')throw 'Invalid container';
				if(!files || !files.length)throw 'Invalid files array';        
				
				var playNext = function() {
					if(index < files.length) {
						container.src = files[index];
						index += 1;
					} else {
						container.removeEventListener('ended', playNext, false);
					}
				};
				
				container.addEventListener('ended', playNext);
				
				container.src = files[0];
			};
			
			var container = document.getElementById('container');
			
			new Mp3Queue(container, [
				'suara/nomor-urut.wav',
				'suara/dua.wav',
				'suara/ratus.wav',
				'suara/dua.wav',
				'suara/loket.wav',
				'suara/dua.wav'
			]);
			container.play();
		})();
	 }
}

}
