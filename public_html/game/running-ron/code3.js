gdjs.FINISHCode = {};
gdjs.FINISHCode.GDRightObjects1= [];
gdjs.FINISHCode.GDRightObjects2= [];
gdjs.FINISHCode.GDLeftObjects1= [];
gdjs.FINISHCode.GDLeftObjects2= [];
gdjs.FINISHCode.GDFoodsEarnedObjects1= [];
gdjs.FINISHCode.GDFoodsEarnedObjects2= [];
gdjs.FINISHCode.GDPlayerObjects1= [];
gdjs.FINISHCode.GDPlayerObjects2= [];
gdjs.FINISHCode.GDExpEarnedObjects1= [];
gdjs.FINISHCode.GDExpEarnedObjects2= [];
gdjs.FINISHCode.GDEXPObjects1= [];
gdjs.FINISHCode.GDEXPObjects2= [];
gdjs.FINISHCode.GDSignObjects1= [];
gdjs.FINISHCode.GDSignObjects2= [];
gdjs.FINISHCode.GDBridgeObjects1= [];
gdjs.FINISHCode.GDBridgeObjects2= [];
gdjs.FINISHCode.GDBridge2Objects1= [];
gdjs.FINISHCode.GDBridge2Objects2= [];
gdjs.FINISHCode.GDFoodsObjects1= [];
gdjs.FINISHCode.GDFoodsObjects2= [];
gdjs.FINISHCode.GDToNextLvlObjects1= [];
gdjs.FINISHCode.GDToNextLvlObjects2= [];
gdjs.FINISHCode.GDDoorTopObjects1= [];
gdjs.FINISHCode.GDDoorTopObjects2= [];
gdjs.FINISHCode.GDDoorMidObjects1= [];
gdjs.FINISHCode.GDDoorMidObjects2= [];
gdjs.FINISHCode.GDGreenFlagObjects1= [];
gdjs.FINISHCode.GDGreenFlagObjects2= [];
gdjs.FINISHCode.GDLadderTopObjects1= [];
gdjs.FINISHCode.GDLadderTopObjects2= [];
gdjs.FINISHCode.GDLadderMidObjects1= [];
gdjs.FINISHCode.GDLadderMidObjects2= [];
gdjs.FINISHCode.GDPlayObjects1= [];
gdjs.FINISHCode.GDPlayObjects2= [];
gdjs.FINISHCode.GDFinishObjects1= [];
gdjs.FINISHCode.GDFinishObjects2= [];
gdjs.FINISHCode.GDCongratsObjects1= [];
gdjs.FINISHCode.GDCongratsObjects2= [];
gdjs.FINISHCode.GDBackgroundEmptyObjects1= [];
gdjs.FINISHCode.GDBackgroundEmptyObjects2= [];
gdjs.FINISHCode.GDPlayAgainObjects1= [];
gdjs.FINISHCode.GDPlayAgainObjects2= [];

gdjs.FINISHCode.conditionTrue_0 = {val:false};
gdjs.FINISHCode.condition0IsTrue_0 = {val:false};
gdjs.FINISHCode.condition1IsTrue_0 = {val:false};
gdjs.FINISHCode.conditionTrue_1 = {val:false};
gdjs.FINISHCode.condition0IsTrue_1 = {val:false};
gdjs.FINISHCode.condition1IsTrue_1 = {val:false};


gdjs.FINISHCode.eventsList0 = function(runtimeScene) {

{


gdjs.FINISHCode.condition0IsTrue_0.val = false;
{
{gdjs.FINISHCode.conditionTrue_1 = gdjs.FINISHCode.condition0IsTrue_0;
gdjs.FINISHCode.conditionTrue_1.val = runtimeScene.getOnceTriggers().triggerOnce(9752852);
}
}if (gdjs.FINISHCode.condition0IsTrue_0.val) {
{gdjs.evtTools.sound.playSound(runtimeScene, "Intro Theme_0.mp3", false, 100, 1);
}}

}


{


gdjs.FINISHCode.condition0IsTrue_0.val = false;
{
gdjs.FINISHCode.condition0IsTrue_0.val = gdjs.evtTools.input.isMouseButtonPressed(runtimeScene, "Left");
}if (gdjs.FINISHCode.condition0IsTrue_0.val) {
{gdjs.evtTools.runtimeScene.replaceScene(runtimeScene, "LEVEL 1", false);
}}

}


};

gdjs.FINISHCode.func = function(runtimeScene) {
runtimeScene.getOnceTriggers().startNewFrame();

gdjs.FINISHCode.GDRightObjects1.length = 0;
gdjs.FINISHCode.GDRightObjects2.length = 0;
gdjs.FINISHCode.GDLeftObjects1.length = 0;
gdjs.FINISHCode.GDLeftObjects2.length = 0;
gdjs.FINISHCode.GDFoodsEarnedObjects1.length = 0;
gdjs.FINISHCode.GDFoodsEarnedObjects2.length = 0;
gdjs.FINISHCode.GDPlayerObjects1.length = 0;
gdjs.FINISHCode.GDPlayerObjects2.length = 0;
gdjs.FINISHCode.GDExpEarnedObjects1.length = 0;
gdjs.FINISHCode.GDExpEarnedObjects2.length = 0;
gdjs.FINISHCode.GDEXPObjects1.length = 0;
gdjs.FINISHCode.GDEXPObjects2.length = 0;
gdjs.FINISHCode.GDSignObjects1.length = 0;
gdjs.FINISHCode.GDSignObjects2.length = 0;
gdjs.FINISHCode.GDBridgeObjects1.length = 0;
gdjs.FINISHCode.GDBridgeObjects2.length = 0;
gdjs.FINISHCode.GDBridge2Objects1.length = 0;
gdjs.FINISHCode.GDBridge2Objects2.length = 0;
gdjs.FINISHCode.GDFoodsObjects1.length = 0;
gdjs.FINISHCode.GDFoodsObjects2.length = 0;
gdjs.FINISHCode.GDToNextLvlObjects1.length = 0;
gdjs.FINISHCode.GDToNextLvlObjects2.length = 0;
gdjs.FINISHCode.GDDoorTopObjects1.length = 0;
gdjs.FINISHCode.GDDoorTopObjects2.length = 0;
gdjs.FINISHCode.GDDoorMidObjects1.length = 0;
gdjs.FINISHCode.GDDoorMidObjects2.length = 0;
gdjs.FINISHCode.GDGreenFlagObjects1.length = 0;
gdjs.FINISHCode.GDGreenFlagObjects2.length = 0;
gdjs.FINISHCode.GDLadderTopObjects1.length = 0;
gdjs.FINISHCode.GDLadderTopObjects2.length = 0;
gdjs.FINISHCode.GDLadderMidObjects1.length = 0;
gdjs.FINISHCode.GDLadderMidObjects2.length = 0;
gdjs.FINISHCode.GDPlayObjects1.length = 0;
gdjs.FINISHCode.GDPlayObjects2.length = 0;
gdjs.FINISHCode.GDFinishObjects1.length = 0;
gdjs.FINISHCode.GDFinishObjects2.length = 0;
gdjs.FINISHCode.GDCongratsObjects1.length = 0;
gdjs.FINISHCode.GDCongratsObjects2.length = 0;
gdjs.FINISHCode.GDBackgroundEmptyObjects1.length = 0;
gdjs.FINISHCode.GDBackgroundEmptyObjects2.length = 0;
gdjs.FINISHCode.GDPlayAgainObjects1.length = 0;
gdjs.FINISHCode.GDPlayAgainObjects2.length = 0;

gdjs.FINISHCode.eventsList0(runtimeScene);
return;

}

gdjs['FINISHCode'] = gdjs.FINISHCode;
