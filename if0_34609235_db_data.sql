-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: sql211.infinityfree.com
-- Generation Time: Feb 27, 2024 at 10:57 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `if0_34609235_db_data`
--

-- --------------------------------------------------------

--
-- Table structure for table `demodata`
--

CREATE TABLE `demodata` (
  `id` int(255) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cpassword` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `demodata`
--

INSERT INTO `demodata` (`id`, `name`, `email`, `phone`, `password`, `cpassword`, `image`, `token`, `status`) VALUES
(2, 'radhedebu_321â¤ï¸', 'ds2357196@gmail.com', '07319256047', '$2y$10$gnl9RYy8Emu6wSNPoxu.f.Hvf/at1AM7lMg/o3ewKrIWjCXt.tt52', '$2y$10$KC7t7MfKOo2Pra4cAi9IG.Md1GVFNPYPIkHT.MPc.OgfNIpxxQ9UW', 'pimg/radha.png', 'f4799a776f3ecf68b7538ab9e5eda7', 'active'),
(3, 'soma bag', 'bagsoma79@gmail.com', '45545844647', '$2y$10$8HLg31BReXSMEWcCBKoXhuKHD/1wYZH3KJ05C34HTeeFfTpMQJDWO', '$2y$10$aJ/eyt6eoF99emfrldtW9O4FrrQ8OcZ4opw.iJ6hSjQKG3cPK/TlG', 'pimg/20240203_032444.jpg', 'a480f245b8e5d4237c3710d7b6917f', 'active'),
(4, 'Trinanjan', 'trinanjanchhari@gmail.com', '9876543210', '$2y$10$ME7qsdgVb7NOmxv8QwVnW.GugPsC4XFLZGrLu9fSvsEncylUAhjFe', '$2y$10$c.uGkF8wXQxKRjAaLvkKp.yQTorWVOK/AlBackTxvy/lhrW9aHqrG', 'pimg/IMG_20230713_113902.jpg', '61c31335f26acd53689834a6d4751f', 'active'),
(5, 'Manisha Bhattacharyya ', 'jmanishabhattacharyya@gmail.com', '7063527985', '$2y$10$yw4ap.QRH2NW.Ua5HSn7BuyqWo6Gz8illGDJNDDG99y345dNW9Rmi', '$2y$10$t5Op.TzaEV74zwPUsHJdMO9lODc3hFn0ASM1Y/D9ixaXh9cpEx/hq', 'pimg/IMG-20220806-WA0003.jpg', '62522bf4b428b9a7353ceb959e3373', 'active'),
(6, 'Sudeshna santra', 'radhedebu2050@gmail.com', '637383938474', '$2y$10$1IPJk2IGYUc6uxMAbiasVebWIQCysuM4O7y4gWy2DQxBl7V5By25W', '$2y$10$ct/dejL5GlsKOEiZLP7EguS0w/yxzc.yyhQrEKLNvI4eN3aXlz4M2', 'pimg/IMG20230429153810.jpg', '09808caeb80495cb9416648c6860a1', 'inactive'),
(7, 'Sudeshna santra', 'radhe.debu2021@gmail.com', '454964643494', '$2y$10$DKOcBdJxUoRZAB.Yj.t0UuuGDnqguHCrzHRXgNWelPel8GA9iq1jW', '$2y$10$5sGKVSPPcNDXwRUbFGdBPu.wJLGXL5q2q/PvQ21A8Gxn2WvYSE96u', 'pimg/IMG20221002215727.jpg', '7a22f60aaabb5df9b3187a7967e7e5', 'active'),
(8, 'Shreya das', 'demonickemail@gmail.com', '5784786485', '$2y$10$ufncT0kfxOHyc98rf24rteVSKudw9JyhIQ1RTEqOKlNrE6ZX/i8s6', '$2y$10$t5f1WBoibQThbBGzsOkg1O3uFiCGINz2I/DWat0fR1CI0JIVZ30E6', 'pimg/IMG_20230319_220408.jpg', '1960b20ac22230c05fa6aa9ad4b848', 'active'),
(9, 'Sonjoy Bag', 'bagsonjoy9@gmail.com', '9002442645', '$2y$10$r0a8VAHmzRkco7.1z3EpAexIugzIO8WLZxRUFDjfZu7pBnk62aBzS', '$2y$10$oHxGp0nJrGhUvm9.jNS6kew6MqlI9M15Fz6y0Yv8DB7QpiR4DP13G', 'pimg/maxresdefault.jpg', '5ef78ba125617194ab796f8083142a', 'active'),
(10, 'sahabuddin sekh', 'sekhsahabuddin022@gmail.com', '7363885945', '$2y$10$vF5V3jHNRyCMW4gggELgGuB8WwZjWMp7ptT6X3RezbCvfxcg.DTVO', '$2y$10$wmS3uWeRlsCq4T9Li0dr9eJLGZDFXK0g2Nv01Q2MWtRh06uprAVAa', 'pimg/IMG_20220330_202920.jpg', '6b8bfd0990ead04d82c155222da521', 'active'),
(11, 'Jiniya ', 'jiniyarej@gmail.com', '9876554321144', '$2y$10$JFEy4yGPNEJKaLdEXwr/CeyX.HjzHC63CNWImMqyzLU8/VHMl/0GS', '$2y$10$eb.bYIXRiA4nBy1342F4DemjivPVHzWB9Y9wQ3BhqqDbvPplT1yn6', 'pimg/IMG_20230705_093334.jpg', 'b0b621af1c2b1643e6cf3d3bdb6152', 'active'),
(12, 'kasturi paul', 'paulkasturiranjan@gmail.com', '454454545754', '$2y$10$5makOihLfdvC54w9FECq8unNPkOdeRAyZNRsxLTd3OS0lLivvNJ/W', '$2y$10$CgJTuLdYO8hLrX.QAIq.nuWMuocXrrrYEnQzirgkccbQk3Q5La9PW', 'pimg/20201223_191553.jpg', 'ae6f026bdca2feb83bab768b5b38c2', 'active'),
(13, 'Arnob Pal', 'arnobpal814@gmail.com', '8145763837', '$2y$10$Cl/H5S4x8znrmGSs7ch3ee.0Al1Z7NQXdPozCl1G6s8ZBdYInB0Oi', '$2y$10$Ur5JCeW6BPSRpSOpff.TA.DEovPEYyAzeumO0xONkGlh9/nNiosFa', 'pimg/20230709_0448344267456559354844351.jpg', '402150b81fd99d4f9061da11ef774b', 'active'),
(15, 'DILIP KUMAR SHYAM CHOWDHURY', 'tuhitchowdhury@gmail.com', '09830616942', '$2y$10$lESQRWy5qvth.2/23c2cOubVFuOJVwp8mauyTdjsX8I7dTeMfcEwS', '$2y$10$Xvhp0b16Nw.JmpX6Ttyuw.KoNjP4SO3.5tIJufCMIV/bhM1ICfRnW', 'pimg/IMG-20220621-WA0001.jpg', '', ''),
(16, 'Dipan Basak', 'dipaneducation46@gmail.com', '+919679901166', '$2y$10$qGDZ4qILXSum4InknTPMO.XJouyRDrIoJnl1IlfLCC5isbWSj0fde', '$2y$10$PuQQLU65tnqdvfNFIZ6E4eJ/VzKJEcNWZzJ0HtItBaGj1m7kZFMA6', 'pimg/IMG_20230709_125932.jpg', '', ''),
(17, 'Diptangshu Bal', 'surjabal2004@gmail.com', '9046930457', '$2y$10$YrsXYDr3rL.bn4KXX9MtTOLscon8peQhnXP2115ILey.P.349LNYy', '$2y$10$OCl9clO4dpJ58LpHQmjXv.VKAcDKRIgIcPuEbwbGK3FrOVifVRYuO', 'pimg/IMG_20230714_180608.jpg', '', ''),
(18, 'Mritunjay ', 'mritunjayaman2003@gmail.com', '9771083290', '$2y$10$F/zd2UUDHyykewTWKNWiUumeO24bJramSV83.KZR9V5LkKxMhJ3ie', '$2y$10$7sNg.PzNGMisaefdRPlUGuYMYIBR/aYldwhSIx2e7nMhsKv78WUxy', 'pimg/IMG20230721232808.jpg', '', ''),
(19, 'Avik Kumar Das', 'avik.das1911@gmail.com', '5286283618', '$2y$10$yIdw1LArQ/1pPEkux.0x0er0eKP9ZUqipIuY0yp2nYDrxnRCuBMeC', '$2y$10$eO03OX0Kd1vkfXIU46IXKuCoOEn0y6JgKkB0Ibvxu4jk2SHYKskmG', 'pimg/IMG_20221225_064945.jpg', '', ''),
(20, 'IEM college', 'iem.edu.in', '545454545454', '$2y$10$leCWIMEsXFhkoFawvlHaxOdUWws95tEU7tHT8bkDHQdkt0Nh3q99G', '$2y$10$oZ7tezioAJ2BOe3rfwIJdOo7XhjuKniGbuMHGyBa0fLBv5KmcpB3G', 'pimg/logo.png', '', ''),
(21, 'Satyam keshri ', 'satyamkeshri@240gmail.com', '1234567890', '$2y$10$VZYWKWq311O3pLElx9aOV.d.Qxu0yKJUB4X0oCVr4xiSpZAISSPby', '$2y$10$aP2Uyim2cxq2p2BEC0HjdOUpff9sv02949xIkyWehntnQdk0zEBO.', 'pimg/IMG_20230611_030531_614.jpg', '', ''),
(22, 'Ram ram', 'ru33653@gmai.com', '09026323602', '$2y$10$toEUfiNY2bvmj3gfhiLiBOxbg.BKedtU7b56OqEubI6yKPRDQtIdG', '$2y$10$6/VYtyeCNL7AUyZjzKeRLeIxvXF53YrDauARC6BozNPhCUzki4h4G', 'pimg/pic2 - Copy.jpeg', '', ''),
(23, 'Rishabh Upadhyay', 'sirrishabh7@gmail.com', '12345678952', '$2y$10$T6FWzzjgRD7FP4F0XJeyOeizHRQzQPB8DGoh3Ynlty4mj0h/KWWa2', '$2y$10$2uME1Jc3ivUeibwTPCy4G.i/tqn5Fg82SVSV6507xgK5GkeYekdme', 'pimg/arijitimg2.jpg', '', ''),
(24, 'Shubham ', 'vatsrounak46@gmail.com', '9608651642', '$2y$10$M89J0Vz187AME7y/S7qw.uueg6QjtiDOCQ7C8SWO/.2K6pexZb3Ni', '$2y$10$ZFzlZanaCbAa3Q/FhVf67uwNofUBZw0haOOrUsKfDpVpl7u/wWY36', 'pimg/IMG20230504170110.jpg', '', ''),
(25, 'Samanta samanta ', 'maitisurvi@gmail.com', '7810908767', '$2y$10$NPKZDEWdPFBVXmkI1vpn3.OJQasxBAVkmYVvbo5pm0gM8ToLLBAQW', '$2y$10$mZhuVoMdHVUO3z5GsKcrZu45KyfdM3bge5qQTGW0SDRepw3GTpmPi', 'pimg/B612_20230728_205510_513.jpg', '', ''),
(26, 'D.k', 'd.kdebanjankundu17@gmail.com', '000000000', '$2y$10$MwZwbp5rcLQlrORQ1kZqmOHOIYNqG9Vmsl6jl9CrSn.w7Qj9vQW22', '$2y$10$o.HnxvEURSC66rHsqRzB4uf623buNmo6tNcH3hJkqV7jqaWLgS5zm', 'pimg/bonnie-kittle-T9WdTxlw6AA-unsplash.jpg', '', ''),
(27, 'Basupriya Bakshi ', 'basupriyabakshi7@gmail.com ', '8348078894', '$2y$10$kaflQ4DCVjGQ9r9jjQrSsepTS5uVCu9Y3zWuxPl1l2GUzB5T7LClC', '$2y$10$cVIFBRZcBZWbiD/0rJT9K.JXlG8kV9KlGquShtQY0rLmQqCjlgMxO', 'pimg/20230730_211616.jpg', '', ''),
(28, 'NAINPRIYA ', 'nainpriya18@gmail.com', '6206742228', '$2y$10$UTTPvwmgoTxJVn2bw0mKt.iM7oxIeuJWP4Mtk54nsL9x.u4QvVlHG', '$2y$10$0Dlxp117geSB8nEkn33xA.7Y/4eJAvxNcA8esH.NQX3HKspWefBAy', 'pimg/SAVE_20230712_185810.jpg', '', ''),
(29, 'Anu', 'abc003@gmail.com', '8258844155', '$2y$10$ebilK5ArVvcAP6WuunRl..oYVLcuRAz1urqmDKKvKvu5yGopAIiYC', '$2y$10$g1N3RX.1rm2dlnd2ZN0VWuIelQxvSscPb5wBBmrexJsk3SGHpcvve', 'pimg/IMG-20211018-WA0014.jpg', '', ''),
(30, 'Atri Panda', 'atripanda20@gmail.com', '8582805152', '$2y$10$gT12OrY1rrNtd9g//WCDr.ywEahiEJr95U9WYqlwkEAqCqB0ulrfK', '$2y$10$dggLEl.HZP6iTrMWYpdDruHEA4tvSbEPBRpBK/0iSvU3P7zuo8Huu', 'pimg/IMG_3412.JPG', '', ''),
(31, 'Suman mondal ', 'sumanmondal721653@gmail.com', '8494643249464', '$2y$10$K.UvkkEOkriWrEivVZNAv.f4gDOOrLOVg7b9vsIX5qMb0zVvVeOCS', '$2y$10$rVQtIzl.e9ueEFY5w7t3xuBgi6eN9Bn8etxABsGY.96mF0./wP0aC', 'pimg/IMG20230718064506.jpg', '', ''),
(32, 'Soham Koley', 'sohamkoley391@gmail.com', '7439065998', '$2y$10$AyoEAUXnyXdSUfb5qqQOBOIh4Bp1keeq8ped5k/aTHSoSxhtHTWTm', '$2y$10$Pc0.b.q6h4wGD1B0PekPGulFzfQ0M/XOs0Y70EVltyzW3xZ/xSBHG', 'pimg/SAVE_20230430_235532.jpg', '', ''),
(33, 'Rajbeer Roy', 'rajumeernisu@gmail.com ', '6295391950', '$2y$10$HHFkU4IcSNiRGwrXF3/j0ev9I2l2eWsJHhpHSmcXwc1HzUM4mA.hW', '$2y$10$4/CVEB43YG8J30wCcx874erHE2B4D1M2LW/SJbiiJUY8xCkSIdEQi', 'pimg/å¾®ä¿¡å›¾ç‰‡_20190703102457.jpg', '', ''),
(35, 'Sayan Pramanik', 'sayanshot321@gmail.com', '08170842804', '$2y$10$2WGQ7/h9Nj9g1tce79V3eOiGfBym9Ol7KZuZBeqMdQFDsoDOKrfGi', '$2y$10$RzvED8arCxB8IiQ9.NKm.OIArkGLPXEb4yIpswcVIuuB/QhH3H09a', 'pimg/1000051399.jpg', '', ''),
(36, 'Bipul', 'bipulrahi18@gmail.com', '74885656760000', '$2y$10$IMSeOVID30eUTUJLhOsOvORVPvoF/vEPehO45PPdZ/aAzVhfjRJYW', '$2y$10$jLq7hoZd1mt2yb/t25THVuwPKG8ueT0255jrhUWQtpI0owejZj7L6', 'pimg/61YlxrDsEgS._AC_UF1000,1000_QL80_.jpg', '', ''),
(37, 'Santu ghorai ', 'ghoraikalpana425@gmail.com', '452561879', '$2y$10$KqD0mV9vPRptAjp88grZ3uFLMbkql/U53GMXvD55y3ettK4lu9EiK', '$2y$10$GtJfjFBzPTdUofZOxFNaBuZXRHxDf7g1tGhy2hM9vopQMSSwGwnu6', 'pimg/1000005081.jpg', '', ''),
(38, 'Aniket Das', 'aniketdas26.das03@gmail.com', '09831275229', '$2y$10$pWIpVbbANCFPhRgZjOskO.vUX6yi12.kIFsTDaJX.TbHh5.jrRAS6', '$2y$10$Csg7PW15mUWmSeaWrKpofOBcY3RdrQkJKFGWCTaVJB96h.8aReJJW', 'pimg/20230629_163133.jpg', '', ''),
(39, 'Sayan', 'babudada2sayan@gmail.com', '727272727373', '$2y$10$Ofg4Ajo/Nv85Vfq3ArRFsee521QMqdE2b8J.93N6MdXHE.z/f2lSu', '$2y$10$3SYLgYHtlFiMGHqeaeyBZ.schkNvgRqG140Y8zWik7nOxshzv4uVO', 'pimg/IMG_20230518_180148.jpg', '', ''),
(40, 'Tanbir Aman', 'ta.temp002@gmail.com', '7502502003', '$2y$10$TjlsChkAJipHAFoDFeKZsOX5PL5bOnXSmfCFiRYzQ7VM5VxuQJgXe', '$2y$10$vLupTqCBCv0TrYZak6/YoORv8Y39nTVF39NBBBBcqePdTMz5Fulou', 'pimg/Screenshot_2023-08-19-17-47-35-677_app.revanced.android.youtube.jpg', '', ''),
(41, 'Shubham', 'shubhammuz110203@gmail.com', '7491963501', '$2y$10$uh3DcuZ/sWH6pBmPqEw.2eEDAK.kxtOFgVV33LLIeN5F0/BWLqZXu', '$2y$10$epbWxNuDGMtiOs9RY8zqa.XCV3Fwahx8VpKT/x1ZsNNyTKaHd6XEa', 'pimg/Lzsbq0suKCFpTQKFKQ8vD4wG5mASvKdBXwLydSQrN5oFsbXjTciDXAxxcUOpeAtaHKE5O3F-mjrzP3Etf3cdF6ePOqSif_W6zA=w1600-rj', '', ''),
(42, 'yuvraj', 'yuvraj8847.11@gmail.com', '7061529968', '$2y$10$VFjYI4CYll49ax6jEI.qH.QXdEDw7wkdtKqOJ0ZMr.lZo6AHgKKqG', '$2y$10$04YMHJvAVz7zLXzxT6No3u1bsJ15sjdTwi2HdxV4nuJqNNrXnVXjq', 'pimg/kace-rodriguez-p3OzJuT_Dks-unsplash.jpg', '', ''),
(43, 'IEM library', 'library.iem.in', '4545458745', '$2y$10$lxyUxKhiSxJh4wv9wwvFpuwzqagnpB/cD8u1ZKjbiZtzhzySMwNsy', '$2y$10$FIypNMiC9L6UaBmsZ1gCH.jifWafpXk7wrvFfGSmDtoZGL8dNYwOm', 'pimg/istockphoto-1252210017-1024x1024.jpg', '', ''),
(44, 'Ayush Mishra', 'mishraayush88728@gmail.com', '8101126449', '$2y$10$P/8M9YWqPQIErfkI.PrUxu4mj6HsLcdGeqoCdwiH3vuTyyOscYk.K', '$2y$10$Gtojws7WpFjM1C1Rw5T1kurjvvoKj7oHg..X9x36qpCwG2bP6IHuO', 'pimg/IMG_20230819_094102_312.jpg', '', ''),
(45, 'Manobina jana', 'Jana.manobina9@gmail.com', '7063015716', '$2y$10$Bf3G8l1ruAS/QVb2dJa27uK1G/55pW58eHGIBeCQsgaU8zS5NB/p2', '$2y$10$I8yOCcGAGa9WX1RWmzA66uukhu7e5JqD8NYKVKfbJVES2zDZDpanO', 'pimg/IMG_20230806_134823.jpg', '', ''),
(46, 'Soham Pandit', 'panditsoham83@gmail.com', '07908441553', '$2y$10$s6CbJVgQ3EuxOWJH7Q0Tk.TPBYQODsiaC7giSyg6vOlAxE4Nvv2oO', '$2y$10$yniyWx5qTGo.3W055KsNXew3K.xOqcK2pXVZ8VIDfc34RDU9ckkDy', 'pimg/WhatsApp Image 2023-08-07 at 16.02.01.jpg', '', ''),
(47, 'Soham Chakraborty ', 'soham3113567@gmail.com', '8250896159', '$2y$10$Dl2rZS9vjUTfFHwUwc/5L.yAAp3WY9pl/SVwS6ikaAFyGJiYjo/eO', '$2y$10$Vd.ygUtv7zDnNgDrfkSVverAz4NIZp4mKKCFouJEWExwoJAk9xqEe', 'pimg/IMG_20230830_203133_699.jpg', '', ''),
(48, 'Sheuli kayal ', 'kayalsheuli@gmail.com', '7047544886', '$2y$10$jEqUltwAdL6szq96tFZoee/3R6fod1VNSadAQGmKD8L41l8fEU0kC', '$2y$10$fhdrk11ybz2LC9k4Us3yiO/W2BckocB5bzNBC0lf9yughUXWg.jhq', 'pimg/Screenshot_2023-08-29-07-39-38-53_99c04817c0de5652397fc8b56c3b3817.jpg', '', ''),
(49, 'Sudin Nayek ', 'sudinnayek2000@gmail.com', '7478658363', '$2y$10$qV2cbaJ7PTvsGrAj.6WbFuD.BHCo8KBkJjY32r0oVW/RnWIwuL/0q', '$2y$10$AP7kbGS4h7evH192P90LTumzvUFucorxMougmbbOwHCk3bSTduesG', 'pimg/1000002124.jpg', '', ''),
(50, 'Nilanjan Kundu ', 'nilanjankuduhs@gmail.com', '8101782224', '$2y$10$aWTZgSusogMNBl.Xy5kjmePzHMhYndabQeQvy10e3LxwbYh/0Tgjq', '$2y$10$eziVzSckqJqCmYjZm1Wwse5j2LucJCG289svji7XyvoH7RVBemNli', 'pimg/Screenshot_20231003_234148.jpg', '', ''),
(51, 'Debarati Bera', 'dbera74@gmail.com', '9433189322', '$2y$10$5WHYNBE6j1FvKowltnlNLOh9RPgh/MAa74gnLNoRYDjojUkNF3RVm', '$2y$10$verZlD3kpWQ9Lo7DxSmqBOPki/5BhPIKyHhrdMV.8y/zSROUh6R4C', 'pimg/IMG_20231020_205946_901.webp', '', ''),
(52, 'Debayan Rana ', 'debayanrana2020@gmail.com', '12346', '$2y$10$ReHVAwk1gt3OlNVkit5n2uOSz8DuF67S/yGMsvdkwgKTiyeKAR08a', '$2y$10$rryuvCEtH6fAJYmu2mx/0OhoHVtFQHLAZ1E0sMm/Upe2G9cv6I68S', 'pimg/images (17).jpeg', '', ''),
(53, 'sayan das', 'silentlie402@gmail.com', '8250076089', '$2y$10$jF6f76vFOlDCiu7yFpOkHuJfW/L/jlt6YieOHcE9In2EkFgBLspza', '$2y$10$fMWh19j3q8DiFCsFr8L5ZefE5fVvsfaJC3qVbvU.CAjNWIowZJf2y', 'pimg/3143b60e0095a29b0b688357a4ce6d1b.jpg', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `mailtable`
--

CREATE TABLE `mailtable` (
  `id` int(255) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `msg` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `msgdate` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `mailtable`
--

INSERT INTO `mailtable` (`id`, `name`, `image`, `msg`, `email`, `msgdate`) VALUES
(4, 'Manisha Bhattacharyya ', 'pimg/IMG-20220806-WA0003.jpg', 'I like this website..visit again....', 'jmanishabhattacharyya@gmail.com', ''),
(5, 'Sudeshna santra', 'pimg/IMG20221002215727.jpg', 'Such a good website similar to all social media', 'radhe.debu2021@gmail.com', ''),
(6, 'radhedebu_321â¤ï¸', 'pimg/radha.png', 'thank you all...', 'ds2357196@gmail.com', ''),
(7, 'Shreya das', 'pimg/IMG_20230319_220408.jpg', 'Good website I have ever seen', 'demonickemail@gmail.com', ''),
(8, 'Trinanjan', 'pimg/IMG_20230713_113902.jpg', 'Nice website', 'trinanjanchhari@gmail.com', ''),
(9, 'Sonjoy Bag', 'pimg/maxresdefault.jpg', 'As not like as I aspect ', 'bagsonjoy9@gmail.com', ''),
(17, 'sahabuddin sekh', 'pimg/IMG_20220330_202920.jpg', 'hlw debu da darun hoyeche', 'sekhsahabuddin022@gmail.com', ''),
(18, 'Jiniya ', 'pimg/IMG_20230705_093334.jpg', 'Op baniyecho toh', 'jiniyarej@gmail.com', ''),
(19, 'radhedebu_321â¤ï¸', 'pimg/radha.png', 'Good night guys', 'ds2357196@gmail.com', ''),
(20, 'radhedebu_321â¤ï¸', 'pimg/radha.png', 'good moring everyone ❤️', 'ds2357196@gmail.com', '12-07-23'),
(22, 'kasturi paul', 'pimg/20201223_191553.jpg', 'All the best Debu', 'paulkasturiranjan@gmail.com', '12-07-23'),
(23, 'radhedebu_321â¤ï¸', 'pimg/radha.png', 'Good night from Medinipur ❤️', 'ds2357196@gmail.com', '13-07-23'),
(24, 'Arnob Pal', 'pimg/20230709_0448344267456559354844351.jpg', 'Hi everyone ❤️', 'arnobpal814@gmail.com', '15-07-23'),
(25, 'DILIP KUMAR SHYAM CHOWDHURY', 'pimg/IMG-20220621-WA0001.jpg', 'Good morning ', 'tuhitchowdhury@gmail.com ', '25-07-23'),
(26, 'Dipan Basak', 'pimg/IMG_20230709_125932.jpg', 'Hi guys', 'dipaneducation46@gmail.com', '25-07-23'),
(27, 'radhedebu_321â¤ï¸', 'pimg/radha.png', 'ðŸ¥°ðŸ¥°ðŸ¥°', 'ds2357196@gmail.com', '25-07-23'),
(30, 'Mritunjay ', 'pimg/IMG20230721232808.jpg', 'Hello guys ', 'mritunjayaman2003@gmail.com', '26-07-23'),
(34, 'Manisha Bhattacharyya ', 'pimg/IMG-20220806-WA0003.jpg', 'The model is working very well ðŸ¤žðŸ¤žðŸ¤ž', 'jmanishabhattacharyya@gmail.com', '27-07-23'),
(35, 'Avik Kumar Das', 'pimg/IMG_20221225_064945.jpg', 'Good day', 'avik.das1911@gmail.com', '27-07-23'),
(37, 'Satyam keshri ', 'pimg/IMG_20230611_030531_614.jpg', 'Hii ', 'satyamkeshri@240gmail.com', '28-07-23'),
(38, 'Satyam keshri ', 'pimg/IMG_20230611_030531_614.jpg', 'Hii ', 'satyamkeshri@240gmail.com', '28-07-23'),
(40, 'IEM college', 'pimg/logo.png', 'keep it upðŸ¤žðŸ¤žðŸ¤ž', 'iem.edu.in', '28-07-23'),
(42, 'Shubham ', 'pimg/IMG20230504170110.jpg', 'Good website', 'vatsrounak46@gmail.com', '29-07-23'),
(44, 'Samanta samanta ', 'pimg/B612_20230728_205510_513.jpg', 'It takes much time to open', 'maitisurvi@gmail.com', '31-07-23'),
(45, 'D.k', 'pimg/bonnie-kittle-T9WdTxlw6AA-unsplash.jpg', 'hello everyone !!!! ðŸ¤žðŸ¤ž', 'd.kdebanjankundu17@gmail.com', '01-08-23'),
(46, 'NAINPRIYA ', 'pimg/SAVE_20230712_185810.jpg', 'Hi', 'nainpriya18@gmail.com', '03-08-23'),
(47, 'Atri Panda', 'pimg/IMG_3412.JPG', 'Hello World\r\n', 'atripanda20@gmail.com', '03-08-23'),
(48, 'IEM college', 'pimg/logo.png', 'import java.util.Scanner;\r\npublic class Marks{\r\npublic static void main(String[] args){\r\n\r\n   Scanner sc = new Scanner(System.in);\r\n   System.out.println(\"Enter the number of subject\");\r\n   int n = sc.nextInt();\r\n   int arr[] = new  int[n];\r\n   \r\n   for(i', 'iem.edu.in', '04-08-23'),
(49, 'Suman mondal ', 'pimg/IMG20230718064506.jpg', 'Hi', 'sumanmondal721653@gmail.com', '05-08-23'),
(51, 'soma bag', 'pimg/20240203_032444.jpg', 'You have to modify It immediately, ðŸ˜•ðŸ˜•ðŸ˜•\r\n', 'bagsoma79@gmail.com', '05-08-23'),
(52, 'IEM college', 'pimg/logo.png', 'good night studentsðŸ’¤ðŸ’¤', 'iem.edu.in', '05-08-23'),
(53, 'Ram ram', 'pimg/pic2 - Copy.jpeg', 'Good afternoon ', 'ru33653@gmai.com', '07-08-23'),
(54, 'Ram ram', 'pimg/pic2 - Copy.jpeg', 'Good afternoon ', 'ru33653@gmai.com', '07-08-23'),
(55, 'Bipul', 'pimg/61YlxrDsEgS._AC_UF1000,1000_QL80_.jpg', 'Hi', 'bipulrahi18@gmail.com', '15-08-23'),
(56, 'Bipul', 'pimg/61YlxrDsEgS._AC_UF1000,1000_QL80_.jpg', 'Hi', 'bipulrahi18@gmail.com', '15-08-23'),
(57, 'Bipul', 'pimg/61YlxrDsEgS._AC_UF1000,1000_QL80_.jpg', 'Hi', 'bipulrahi18@gmail.com', '15-08-23'),
(58, 'Bipul', 'pimg/61YlxrDsEgS._AC_UF1000,1000_QL80_.jpg', 'Hi', 'bipulrahi18@gmail.com', '15-08-23'),
(59, 'Bipul', 'pimg/61YlxrDsEgS._AC_UF1000,1000_QL80_.jpg', 'Hi', 'bipulrahi18@gmail.com', '15-08-23'),
(60, 'Sayan', 'pimg/IMG_20230518_180148.jpg', 'Good website ', 'babudada2sayan@gmail.com', '21-08-23'),
(61, 'Sayan', 'pimg/IMG_20230518_180148.jpg', 'Good website ', 'babudada2sayan@gmail.com', '21-08-23'),
(62, 'Sayan', 'pimg/IMG_20230518_180148.jpg', 'Good website ', 'babudada2sayan@gmail.com', '21-08-23'),
(63, 'Ayush Mishra', 'pimg/IMG_20230819_094102_312.jpg', 'hi debu dada', 'mishraayush88728@gmail.com', '25-08-23'),
(65, 'Soham Pandit', 'pimg/WhatsApp Image 2023-08-07 at 16.02.01.jpg', 'good night', 'panditsoham83@gmail.com', '12-09-23'),
(66, 'Soham Chakraborty ', 'pimg/IMG_20230830_203133_699.jpg', 'Hi good evening ', 'soham3113567@gmail.com', '13-09-23'),
(67, 'Sheuli kayal ', 'pimg/Screenshot_2023-08-29-07-39-38-53_99c04817c0de5652397fc8b56c3b3817.jpg', 'Good project ðŸ‘', 'kayalsheuli@gmail.com', '19-09-23'),
(68, 'Sudin Nayek ', 'pimg/1000002124.jpg', 'Hi', 'sudinnayek2000@gmail.com', '23-09-23'),
(69, 'Nilanjan Kundu ', 'pimg/Screenshot_20231003_234148.jpg', 'Hi', 'nilanjankuduhs@gmail.com', '04-10-23'),
(70, 'radhedebu_321â¤ï¸', 'pimg/radha.png', 'happy diwali to all â¤ï¸', 'ds2357196@gmail.com', '14-11-23'),
(71, 'radhedebu_321â¤ï¸', 'pimg/radha.png', 'happy diwali to all â¤ï¸', 'ds2357196@gmail.com', '14-11-23'),
(72, 'sayan das', 'pimg/3143b60e0095a29b0b688357a4ce6d1b.jpg', 'good evening', 'silentlie402@gmail.com', '21-02-24');

-- --------------------------------------------------------

--
-- Table structure for table `main_content`
--

CREATE TABLE `main_content` (
  `id` int(255) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `profileimg` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `video` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `desp` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `main_content`
--

INSERT INTO `main_content` (`id`, `username`, `profileimg`, `video`, `desp`, `email`) VALUES
(4, 'Trinanjan', 'pimg/IMG_20230713_113902.jpg', 'mainmedia/VID_565560218_090008_397.mp4', '', 'trinanjanchhari@gmail.com'),
(5, 'Manisha Bhattacharyya ', 'pimg/IMG-20220806-WA0003.jpg', 'mainmedia/mahadev_status_1011_20230530_112647.mp4', 'Mahadev ', 'jmanishabhattacharyya@gmail.com'),
(7, 'Sudeshna santra', 'pimg/IMG20221002215727.jpg', 'mainmedia/VID_42030526_194229_207.mp4', 'Tu hmm wohi', 'radhe.debu2021@gmail.com'),
(8, 'Sudeshna santra', 'pimg/IMG20221002215727.jpg', 'mainmedia/VID_42300511_084956_279.mp4', 'Mere mahaboob ', 'radhe.debu2021@gmail.com'),
(9, 'Manisha Bhattacharyya ', 'pimg/IMG-20220806-WA0003.jpg', 'mainmedia/lyrics_king00008_20230512_174446.mp4', 'Kabhi na fir aaye', 'jmanishabhattacharyya@gmail.com'),
(10, 'Shreya das', 'pimg/IMG_20230319_220408.jpg', 'mainmedia/Snapinsta.app_video_319386485_631862185545946_2577756479344098214_n.mp4', 'Long drive is always special with special person ', 'demonickemail@gmail.com'),
(12, 'radhedebu_321â¤ï¸', 'pimg/radha.png', 'mainmedia/y2mate.com - zehal e miskeen makun ba ranjish hd status  zehal e miskeen makun status_v720P.mp4', '❤️❤️❤️', 'ds2357196@gmail.com'),
(13, 'sahabuddin sekh', 'pimg/IMG_20220330_202920.jpg', 'mainmedia/WhatsApp Video 2023-07-11 at 20.39.07.mp4', '', 'sekhsahabuddin022@gmail.com'),
(14, 'Jiniya ', 'pimg/IMG_20230705_093334.jpg', 'mainmedia/Snapinsta.app_video_315818227_283616517410766_2157647104560272299_n.mp4', '', 'jiniyarej@gmail.com'),
(15, 'radhedebu_321â¤ï¸', 'pimg/radha.png', 'mainmedia/y2mate.com - sayAn  Mon Meteche Mon Moyuri  Cover_1080p.mp4', 'ki jani kar swapne amer', 'ds2357196@gmail.com'),
(18, 'Arnob Pal', 'pimg/20230709_0448344267456559354844351.jpg', 'mainmedia/352845806_253672210597348_5813069930348745218_n.mp4', '❤️❤️', 'arnobpal814@gmail.com'),
(19, 'DILIP KUMAR SHYAM CHOWDHURY', 'pimg/IMG-20220621-WA0001.jpg', 'mainmedia/VID-20230603-WA0002.mp4', '', 'tuhitchowdhury@gmail.com '),
(20, 'Dipan Basak', 'pimg/IMG_20230709_125932.jpg', 'mainmedia/Facebook 1386054965583699(SD).mp4', '', 'dipaneducation46@gmail.com'),
(21, 'radhedebu_321â¤ï¸', 'pimg/radha.png', 'mainmedia/Snapinsta.app_video_594A1405CBE68A329E4B6C15D77A57A9_video_dashinit.mp4', 'â¤ï¸â€ðŸ”¥â¤ï¸â€ðŸ”¥â¤ï¸â€ðŸ”¥', 'ds2357196@gmail.com'),
(22, 'radhedebu_321â¤ï¸', 'pimg/radha.png', 'mainmedia/Namo namo shankara whatsapp status song(720P_HD).mp4', '', 'ds2357196@gmail.com'),
(23, 'radhedebu_321â¤ï¸', 'pimg/radha.png', 'mainmedia/Snapinsta.app_video_10000000_570688885273478_1863893733472566267_n.mp4', 'ðŸ˜ŒðŸ˜ŒðŸ˜Œ', 'ds2357196@gmail.com'),
(24, 'Manisha Bhattacharyya ', 'pimg/IMG-20220806-WA0003.jpg', 'mainmedia/WhatsApp Video 2023-07-27 at 20.30.25.mp4', 'â¤ï¸ðŸ˜ŠðŸ”´', 'jmanishabhattacharyya@gmail.com'),
(26, 'Satyam keshri ', 'pimg/IMG_20230611_030531_614.jpg', 'mainmedia/VID-20221216-WA0002.mp4', '', 'satyamkeshri@240gmail.com'),
(27, 'IEM college', 'pimg/logo.png', 'mainmedia/190828_27_SuperTrees_HD_17_preview.mp4', 'beauty of nature', 'iem.edu.in'),
(29, 'Shubham ', 'pimg/IMG20230504170110.jpg', 'mainmedia/VID-20230715-WA0000.mp4', '', 'vatsrounak46@gmail.com'),
(30, 'Ram ram', 'pimg/pic2 - Copy.jpeg', 'mainmedia/Vido_1685527337864.mp4', '', 'ru33653@gmai.com'),
(31, 'Manisha Bhattacharyya ', 'pimg/IMG-20220806-WA0003.jpg', 'mainmedia/motion.in.emotion_1690670285328873.mp4', 'Have No Idea âœ¨ðŸ’™â£ï¸', 'jmanishabhattacharyya@gmail.com'),
(32, 'Samanta samanta ', 'pimg/B612_20230728_205510_513.jpg', 'mainmedia/VID-20230731-WA0000.mp4', '', 'maitisurvi@gmail.com'),
(33, 'Manisha Bhattacharyya ', 'pimg/IMG-20220806-WA0003.jpg', 'mainmedia/VID_30641102_044246_453.mp4', 'ðŸ˜ŒRadhaðŸ’™ðŸ¤— Krishnaâ£ï¸', 'jmanishabhattacharyya@gmail.com'),
(36, 'D.k', 'pimg/bonnie-kittle-T9WdTxlw6AA-unsplash.jpg', 'mainmedia/290010507_599826671387618_4733637371013706530_n.mp4', 'â¤ï¸ðŸ˜ŠðŸ”´', 'd.kdebanjankundu17@gmail.com'),
(37, 'soma bag', 'pimg/20240203_032444.jpg', 'mainmedia/FB_VID_8780879994124343111.mp4', 'Nothing to say about the place ', 'bagsoma79@gmail.com'),
(38, 'soma bag', 'pimg/20240203_032444.jpg', 'mainmedia/WhatsApp Video 2023-07-09 at 3.55.54 PM.mp4', 'In sher bengal', 'bagsoma79@gmail.com'),
(39, 'Bipul', 'pimg/61YlxrDsEgS._AC_UF1000,1000_QL80_.jpg', 'mainmedia/VID_48900205_004424_794.mp4', '', 'bipulrahi18@gmail.com'),
(40, 'Sayan', 'pimg/IMG_20230518_180148.jpg', 'mainmedia/VID-20230820-WA0004.mp4', '', 'babudada2sayan@gmail.com'),
(41, 'Ayush Mishra', 'pimg/IMG_20230819_094102_312.jpg', 'mainmedia/VID-20230822-WA0020.mp4', '', 'mishraayush88728@gmail.com'),
(42, 'Sheuli kayal ', 'pimg/Screenshot_2023-08-29-07-39-38-53_99c04817c0de5652397fc8b56c3b3817.jpg', 'mainmedia/VID_194530620_130343_808.mp4', 'ðŸ–¤ðŸ¥€âœ¨', 'kayalsheuli@gmail.com'),
(43, 'radhedebu_321â¤ï¸', 'pimg/radha.png', 'mainmedia/WhatsApp Video 2024-02-22 at 2.54.15 PM.mp4', 'Radhe Radhe â¤ï¸', 'ds2357196@gmail.com'),
(44, 'soma bag', 'pimg/20240203_032444.jpg', 'mainmedia/WhatsApp Video 2024-02-22 at 3.01.24 PM.mp4', 'krishna krishna kare atam meri â¤ï¸', 'bagsoma79@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `demodata`
--
ALTER TABLE `demodata`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mailtable`
--
ALTER TABLE `mailtable`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `main_content`
--
ALTER TABLE `main_content`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `demodata`
--
ALTER TABLE `demodata`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `mailtable`
--
ALTER TABLE `mailtable`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `main_content`
--
ALTER TABLE `main_content`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
