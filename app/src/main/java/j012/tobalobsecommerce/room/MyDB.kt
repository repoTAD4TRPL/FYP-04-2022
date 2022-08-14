package j012.tobalobsecommerce.room

import android.content.Context
import androidx.room.Database
import androidx.room.Room
import androidx.room.RoomDatabase
import j012.tobalobsecommerce.model.Alamat
import j012.tobalobsecommerce.model.Produk

@Database(entities = [Produk::class, Alamat::class] /* List model Ex:NoteModel */, version = 1)
abstract class MyDatabase : RoomDatabase() {
    abstract fun daoKeranjang(): DaoKeranjang // DaoNote
    abstract fun daoAlamat(): DaoAlamat // DaoNote

    companion object {
        private var INSTANCE: MyDatabase? = null

        fun getInstance(context: Context): MyDatabase? {
            if (INSTANCE == null) {
                synchronized(MyDatabase::class) {
                    INSTANCE = Room.databaseBuilder(
                        context.applicationContext,
                        MyDatabase::class.java, "MyDatabaasse" // Database Name
                    ).allowMainThreadQueries().build()
                }
            }
            return INSTANCE
        }

        fun destroyInstance() {
            INSTANCE = null
        }
    }
}