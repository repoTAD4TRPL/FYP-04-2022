package j012.tobalobsecommerce.model

import com.google.gson.annotations.SerializedName

data class TransportasiResponse(

	@field:SerializedName("success")
	val success: Int? = null,

	@field:SerializedName("transportasi")
	val transportasi: List<TransportasiItem>? = null,

	@field:SerializedName("message")
	val message: String? = null
)

data class TransportasiItem(

	@field:SerializedName("nama_loket")
	val namaLoket: String? = null,

	@field:SerializedName("transportasi")
	val transportasi: String? = null,

	@field:SerializedName("id_transportasi")
	val idTransportasi: Int? = null,

	@field:SerializedName("id")
	val id: Int? = null,

	@field:SerializedName("id_loket")
	val idLoket: Int = 0
)
