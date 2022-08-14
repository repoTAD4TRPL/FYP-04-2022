package j012.tobalobsecommerce.activity

import android.annotation.SuppressLint
import android.app.Activity
import android.app.AlertDialog
import android.net.Uri
import android.os.Bundle
import android.util.Log
import android.view.View
import android.widget.Button
import android.widget.ImageView
import androidx.activity.result.contract.ActivityResultContracts
import androidx.recyclerview.widget.LinearLayoutManager
import com.github.drjacky.imagepicker.ImagePicker
import com.google.gson.Gson
import com.inyongtisto.myhelper.base.BaseActivity
import com.inyongtisto.myhelper.extension.showErrorDialog
import com.inyongtisto.myhelper.extension.showSuccessDialog
import com.inyongtisto.myhelper.extension.toGone
import com.inyongtisto.myhelper.extension.toMultipartBody
import com.ontbee.legacyforks.cn.pedant.SweetAlert.SweetAlertDialog
import com.squareup.picasso.Picasso
import j012.tobalobsecommerce.R
import j012.tobalobsecommerce.adapter.AdapterProdukTransaksi
import j012.tobalobsecommerce.app.ApiConfig
import j012.tobalobsecommerce.helper.Helper
import j012.tobalobsecommerce.model.DetailTrans
import j012.tobalobsecommerce.model.ResponseModel
import j012.tobalobsecommerce.model.TransaksiModel
import kotlinx.android.synthetic.main.activity_detail_transk.*
import kotlinx.android.synthetic.main.activity_login.*
import kotlinx.android.synthetic.main.toolbar.*
import kotlinx.android.synthetic.main.upload_trans.*
import okhttp3.MediaType
import okhttp3.MediaType.Companion.toMediaTypeOrNull
import okhttp3.MultipartBody
import okhttp3.RequestBody
import retrofit2.Call
import retrofit2.Callback
import retrofit2.Response
import java.io.File
import java.util.*


class DetailTransk : BaseActivity() {

    var transk = TransaksiModel()

    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.activity_detail_transk)
        Helper().settoolbar(this, toolbar, "Detail Transaksi")


        val json  = intent.getStringExtra("transaksi")
        transk = Gson().fromJson(json, TransaksiModel::class.java)
        setData(transk)
        dispProduk(transk.details)
        mainButton()
    }

    private fun mainButton(){
        btn_batal.setOnClickListener{
            SweetAlertDialog(this, SweetAlertDialog.WARNING_TYPE)
                    .setTitleText("Batalkan Transaksi?")
//                    .setContentText("Transaksi akan dibatalkan")
                    .setConfirmText("Ya")
                    .setConfirmClickListener {
                        it.dismissWithAnimation()
                        btlTransk()
                    }
                    .setCancelText("Tutup")
                    .setCancelClickListener {
                        it.dismissWithAnimation()
                    }.show()
        }

        btn_upload.setOnClickListener{
            imagePicker()
        }
    }

    private fun imagePicker(){
        ImagePicker.with(this)
            .crop()
            .maxResultSize(512, 512)
//                .provider(ImageProvider.BOTH) //Or bothCameraGallery()
            .createIntentFromDialog { launcher.launch(it) }
    }

    private val launcher = registerForActivityResult(ActivityResultContracts.StartActivityForResult()) {
        if (it.resultCode == Activity.RESULT_OK) {
            val uri = it.data?.data!!
            // Use the uri to load the image
            Log.d("TAG", "URI IMAGE : " +uri)
            val fileUri: Uri = uri
            dialogUpload(File(fileUri.path!!))
        }
    }

    var alertDialog : AlertDialog? = null

    @SuppressLint("InflateParams")
    private fun dialogUpload(file: File){
        val view = layoutInflater
        val layout = view.inflate(R.layout.upload_trans, null)

        val imageView: ImageView = layout.findViewById(R.id.img_uptransk)
        val btnUpload: Button = layout.findViewById(R.id.btn_uploadTr)
        val btnupImage: Button = layout.findViewById(R.id.btn_image)

        Picasso.get()
            .load(file)
            .into(imageView)

        btnUpload.setOnClickListener {
            upload(file)
        }

        btnupImage.setOnClickListener {
            imagePicker()
        }

        alertDialog = AlertDialog.Builder(this).create()
        alertDialog!!.setView(layout)
        alertDialog!!.setCancelable(true)
        alertDialog!!.show()
    }

    private fun upload(file: File){

        progress.show()
//        val fileImage = file.toMultipartBody()

        var filePart = MultipartBody.Part.createFormData("gambar", file.getName(), RequestBody.create(
            "image/*".toMediaTypeOrNull(), file));


        val map = HashMap<String, Int>()
        map.put("id", transk.id)

        ApiConfig.instanceRetrofit.uploadBukti(map, filePart).enqueue(object : Callback<ResponseModel> {
            override fun onFailure(call: Call<ResponseModel>, t: Throwable) {
                progress.dismiss()
                showErrorDialog(t.message!!)
            }

            override fun onResponse(call: Call<ResponseModel>, response: Response<ResponseModel>) {
                progress.dismiss()
                if (response.isSuccessful){
                    if (response.body()!!.success == 1){
                        showSuccessDialog("Upload Bukti Berhasil"){
                            alertDialog!!.dismiss()
                            btn_upload.toGone()
                            tv_status.text = "DIBAYAR"
                            onBackPressed()
                        }
                    } else {
                        showErrorDialog(response.body()!!.message)
                    }

                } else {
                    showErrorDialog(response.message())
                }
            }
        })
    }

    fun btlTransk(){
        val loading = SweetAlertDialog(this@DetailTransk, SweetAlertDialog.PROGRESS_TYPE)
        loading.setTitleText("Loading...").show()
        ApiConfig.instanceRetrofit.btlcheckout(transk.id).enqueue(object : Callback<ResponseModel> {
            override fun onFailure(call: Call<ResponseModel>, t: Throwable) {
                error(t.message.toString())
            }

            override fun onResponse(call: Call<ResponseModel>, response: Response<ResponseModel>) {
                loading.dismiss()
                val res = response.body()!!
                if (res.success == 1) {

                    SweetAlertDialog(this@DetailTransk, SweetAlertDialog.SUCCESS_TYPE)
                            .setTitleText("Berhasil...")
                            .setContentText("Transaksi Berhasil Dibatalkan")
                            .setConfirmClickListener {
                                it.dismissWithAnimation()
                                onBackPressed()
                            }
                            .show()
//                    Toast.makeText(this@DetailTransk, "Transaksi telah dibatalkan", Toast.LENGTH_SHORT).show()
//
////                    dispRiwayat(res.transaksis)
                } else{
                    error(res.message)
                }
            }
        })
    }

    fun error(pesan: String){
        SweetAlertDialog(this, SweetAlertDialog.ERROR_TYPE)
                .setTitleText("Oops...")
                .setContentText(pesan)
                .show()
    }

    fun setData(t: TransaksiModel) {
        tv_status.text = t.status

        val formatBaru = "d MMMM yyyy, kk:mm:ss"
        tv_tgl.text = Helper().convertTanggal(t.created_at, formatBaru)

        tv_penerima.text = t.name + " - " + t.phone
        tv_alamat.text = t.detail_lokasi
        tv_kodeUnik.text = Helper().Rupiah(t.kode_unik)
        tv_totalBelanja.text = Helper().Rupiah(t.kode_unik)
        tv_ongkir.text = Helper().Rupiah(t.ongkir)
        tv_total.text = Helper().Rupiah(t.total_transfer)

        if (t.status != "MENUNGGU") div_footer.visibility = View.GONE

        var color = getColor(R.color.menunggu)
        if (t.status == "SELESAI") color = getColor(R.color.selesai)
        else if (t.status == "BATAL") color = getColor(R.color.batal)

        tv_status.setTextColor(color)
    }

    fun dispProduk(transaksis: ArrayList<DetailTrans>){
        val layoutManager = LinearLayoutManager(this)
        layoutManager.orientation = LinearLayoutManager.VERTICAL

        rv_produk.adapter = AdapterProdukTransaksi(transaksis)
        rv_produk.layoutManager = layoutManager
    }


    override fun onSupportNavigateUp(): Boolean {
        onBackPressed()
        return super.onSupportNavigateUp()
    }
}