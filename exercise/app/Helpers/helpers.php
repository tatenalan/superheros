<?php

    function getKgWeight($weight) {
        $convertedWeight = preg_replace('/[A-Za-z\s]/', '', $weight);
        return (((float) $convertedWeight) * 0.453592) . ' kg';
    }

    function getCmHeight($height) {
        $convertedHeight = preg_replace('/[\']/','.', $height);
        return (((float) $height) * 30.48) . ' cm';
    }