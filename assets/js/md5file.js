/**
 * Created by sky on 2019/5/9.
 */
function browserMD5File(file,callable) {
    var blobSlice = File.prototype.slice || File.prototype.mozSlice || File.prototype.webkitSlice;
    var spark = new SparkMD5.ArrayBuffer();
    var fileReader = new FileReader();
    var chunkSize = Math.floor( file.size/5);
    var currentChunk = 0;
    var md5s=[];

    fileReader.onload = function (e) {
        if(file.size<=10*1024*1024){
            spark.append(e.target.result);
            callable(null,spark.end());
        }else{
            spark.append(e.target.result);
            md5s.push( spark.end());
            spark=new SparkMD5.ArrayBuffer();
            currentChunk++;
            if (currentChunk < 5) {
                loadNext();
            } else {
                //console.log(md5s);
                spark=new SparkMD5();
                 for(var i=0;i<md5s.length;++i){
                     spark.append(md5s[i]);
                 }
                callable(null,spark.end());
            }

        }
    };

    fileReader.onerror = function () {
        callable('something went wrong.',null);
    };

    function loadNext() {
        var start = currentChunk * chunkSize,
            end = start+2*1024*1024;
        fileReader.readAsArrayBuffer(blobSlice.call(file, start, end));
    }
    loadNext();
}




