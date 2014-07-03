<?php
class DB_Type_Pgsql_Test_ByteaTest extends DB_Type_Test_Util_TypeTestCase
{
    protected function _getPairsOutput()
    {
        return array(
            array(
                new DB_Type_Pgsql_Bytea(false),
                'abc',
                '\x616263',
                "BYTEA",
            ),
            array(
                new DB_Type_Pgsql_Bytea(false),
                chr(0) . chr(1),
                '\x0001',
                "BYTEA",
            ),
            array(
                new DB_Type_Pgsql_Bytea(true),
                chr(0) . chr(1) . 'abc\'xx\\yy',
                '\000\001abc\'xx\\\\yy',
                "BYTEA",
            ),
            array(
                new DB_Type_Pgsql_Bytea(true),
                $this->_getCharSeq(0, 255),
                '\000\001\002\003\004\005\006\007\010\011\012\013\014\015\016\017\020\021\022\023\024\025\026\027\030\031\032\033\034\035\036\037 !"#$%&\'()*+,-./0123456789:;<=>?@ABCDEFGHIJKLMNOPQRSTUVWXYZ[\\\\]^_`abcdefghijklmnopqrstuvwxyz{|}~\177\200\201\202\203\204\205\206\207\210\211\212\213\214\215\216\217\220\221\222\223\224\225\226\227\230\231\232\233\234\235\236\237\240\241\242\243\244\245\246\247\250\251\252\253\254\255\256\257\260\261\262\263\264\265\266\267\270\271\272\273\274\275\276\277\300\301\302\303\304\305\306\307\310\311\312\313\314\315\316\317\320\321\322\323\324\325\326\327\330\331\332\333\334\335\336\337\340\341\342\343\344\345\346\347\350\351\352\353\354\355\356\357\360\361\362\363\364\365\366\367\370\371\372\373\374\375\376\377',
                "BYTEA",
            )
        );
    }
        
    protected function _getPairsInput()
    {
        return $this->_getPairsOutput();
    }

    private function _getCharSeq($from, $to)
    {
        $s = '';
        for ($i = $from; $i <= $to; $i++) {
            $s .= chr($i);
        }
        return $s;
    }
}
